<?php

namespace League\Flysystem;

use InvalidArgumentException;
use League\Flysystem\Plugin\PluggableTrait;
use League\Flysystem\Plugin\PluginNotFoundException;

/**
 * Class MountManager.
 *
 * Proxies methods to Filesystem (@see __call):
 *
 * @method AdapterInterface getAdapter($prefix)
 * @method Config getConfig($prefix)
 * @method array listFiles($directory = '', $recursive = false)
 * @method array listPaths($directory = '', $recursive = false)
 * @method array getWithMetadata($path, array $metadata)
 * @method Filesystem flushCache()
 * @method void assertPresent($path)
 * @method void assertAbsent($path)
 * @method Filesystem addPlugin(PluginInterface $plugin)
 */
class MountManager implements FilesystemInterface
{
    use PluggableTrait;

    /**
     * @var FilesystemInterface[]
     */
    protected $filesystems = [];

    /**
     * Constructor.
     *
     * @param FilesystemInterface[] $filesystems [:prefix => Filesystem,]
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $filesystems = [])
    {
        $this->mountFilesystems($filesystems);
    }

    /**
     * Mount filesystems.
     *
     * @param FilesystemInterface[] $filesystems [:prefix => Filesystem,]
     *
     * @return $this
     * @throws InvalidArgumentException
     *
     */
    public function mountFilesystems(array $filesystems)
    {
        foreach ($filesystems as $prefix => $filesystem) {
            $this->mountFilesystem($prefix, $filesystem);
        }

        return $this;
    }

    /**
     * Mount filesystems.
     *
     * @param string $prefix
     * @param FilesystemInterface $filesystem
     *
     * @return $this
     * @throws InvalidArgumentException
     *
     */
    public function mountFilesystem($prefix, FilesystemInterface $filesystem)
    {
        if (!is_string($prefix)) {
            throw new InvalidArgumentException(__METHOD__ . ' expects argument #1 to be a string.');
        }

        $this->filesystems[$prefix] = $filesystem;

        return $this;
    }

    /**
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     * @throws FilesystemNotFoundException
     *
     * @throws InvalidArgumentException
     */
    public function listContents($directory = '', $recursive = false)
    {
        list($prefix, $directory) = $this->getPrefixAndPath($directory);
        $filesystem = $this->getFilesystem($prefix);
        $result = $filesystem->listContents($directory, $recursive);

        foreach ($result as &$file) {
            $file['filesystem'] = $prefix;
        }

        return $result;
    }

    /**
     * @param string $path
     *
     * @return string[] [:prefix, :path]
     * @throws InvalidArgumentException
     *
     */
    protected function getPrefixAndPath($path)
    {
        if (strpos($path, '://') < 1) {
            throw new InvalidArgumentException('No prefix detected in path: ' . $path);
        }

        return explode('://', $path, 2);
    }

    /**
     * Get the filesystem with the corresponding prefix.
     *
     * @param string $prefix
     *
     * @return FilesystemInterface
     * @throws FilesystemNotFoundException
     *
     */
    public function getFilesystem($prefix)
    {
        if (!isset($this->filesystems[$prefix])) {
            throw new FilesystemNotFoundException('No filesystem mounted with prefix ' . $prefix);
        }

        return $this->filesystems[$prefix];
    }

    /**
     * Call forwarder.
     *
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     * @throws FilesystemNotFoundException
     *
     * @throws InvalidArgumentException
     */
    public function __call($method, $arguments)
    {
        list($prefix, $arguments) = $this->filterPrefix($arguments);

        return $this->invokePluginOnFilesystem($method, $arguments, $prefix);
    }

    /**
     * Retrieve the prefix from an arguments array.
     *
     * @param array $arguments
     *
     * @return array [:prefix, :arguments]
     * @throws InvalidArgumentException
     *
     */
    public function filterPrefix(array $arguments)
    {
        if (empty($arguments)) {
            throw new InvalidArgumentException('At least one argument needed');
        }

        $path = array_shift($arguments);

        if (!is_string($path)) {
            throw new InvalidArgumentException('First argument should be a string');
        }

        list($prefix, $path) = $this->getPrefixAndPath($path);
        array_unshift($arguments, $path);

        return [$prefix, $arguments];
    }

    /**
     * Invoke a plugin on a filesystem mounted on a given prefix.
     *
     * @param string $method
     * @param array $arguments
     * @param string $prefix
     *
     * @return mixed
     * @throws FilesystemNotFoundException
     *
     */
    public function invokePluginOnFilesystem($method, $arguments, $prefix)
    {
        $filesystem = $this->getFilesystem($prefix);

        try {
            return $this->invokePlugin($method, $arguments, $filesystem);
        } catch (PluginNotFoundException $e) {
            // Let it pass, it's ok, don't panic.
        }

        $callback = [$filesystem, $method];

        return call_user_func_array($callback, $arguments);
    }

    /**
     * List with plugin adapter.
     *
     * @param array $keys
     * @param string $directory
     * @param bool $recursive
     *
     * @return array
     * @throws FilesystemNotFoundException
     *
     * @throws InvalidArgumentException
     */
    public function listWith(array $keys = [], $directory = '', $recursive = false)
    {
        list($prefix, $directory) = $this->getPrefixAndPath($directory);
        $arguments = [$keys, $directory, $recursive];

        return $this->invokePluginOnFilesystem('listWith', $arguments, $prefix);
    }

    /**
     * Move a file.
     *
     * @param string $from
     * @param string $to
     * @param array $config
     *
     * @return bool
     * @throws FilesystemNotFoundException
     *
     * @throws InvalidArgumentException
     */
    public function move($from, $to, array $config = [])
    {
        list($prefixFrom, $pathFrom) = $this->getPrefixAndPath($from);
        list($prefixTo, $pathTo) = $this->getPrefixAndPath($to);

        if ($prefixFrom === $prefixTo) {
            $filesystem = $this->getFilesystem($prefixFrom);
            $renamed = $filesystem->rename($pathFrom, $pathTo);

            if ($renamed && isset($config['visibility'])) {
                return $filesystem->setVisibility($pathTo, $config['visibility']);
            }

            return $renamed;
        }

        $copied = $this->copy($from, $to, $config);

        if ($copied) {
            return $this->delete($from);
        }

        return false;
    }

    /**
     * @param string $from
     * @param string $to
     * @param array $config
     *
     * @return bool
     * @throws FilesystemNotFoundException
     * @throws FileExistsException
     *
     * @throws InvalidArgumentException
     */
    public function copy($from, $to, array $config = [])
    {
        list($prefixFrom, $from) = $this->getPrefixAndPath($from);

        $buffer = $this->getFilesystem($prefixFrom)->readStream($from);

        if ($buffer === false) {
            return false;
        }

        list($prefixTo, $to) = $this->getPrefixAndPath($to);

        $result = $this->getFilesystem($prefixTo)->writeStream($to, $buffer, $config);

        if (is_resource($buffer)) {
            fclose($buffer);
        }

        return $result;
    }

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @return bool True on success, false on failure.
     * @throws FileNotFoundException
     *
     */
    public function delete($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->delete($path);
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return bool
     */
    public function has($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->has($path);
    }

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The file contents or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function read($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->read($path);
    }

    /**
     * Retrieves a read-stream for a path.
     *
     * @param string $path The path to the file.
     *
     * @return resource|false The path resource or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function readStream($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->readStream($path);
    }

    /**
     * Get a file's metadata.
     *
     * @param string $path The path to the file.
     *
     * @return array|false The file metadata or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function getMetadata($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->getMetadata($path);
    }

    /**
     * Get a file's size.
     *
     * @param string $path The path to the file.
     *
     * @return int|false The file size or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function getSize($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->getSize($path);
    }

    /**
     * Get a file's mime-type.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The file mime-type or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function getMimetype($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->getMimetype($path);
    }

    /**
     * Get a file's timestamp.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The timestamp or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function getTimestamp($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->getTimestamp($path);
    }

    /**
     * Get a file's visibility.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The visibility (public|private) or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function getVisibility($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->getVisibility($path);
    }

    /**
     * Write a new file.
     *
     * @param string $path The path of the new file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     * @throws FileExistsException
     *
     */
    public function write($path, $contents, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->write($path, $contents, $config);
    }

    /**
     * Write a new file using a stream.
     *
     * @param string $path The path of the new file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     * @throws FileExistsException
     *
     * @throws InvalidArgumentException If $resource is not a file handle.
     */
    public function writeStream($path, $resource, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->writeStream($path, $resource, $config);
    }

    /**
     * Update an existing file.
     *
     * @param string $path The path of the existing file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     * @throws FileNotFoundException
     *
     */
    public function update($path, $contents, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->update($path, $contents, $config);
    }

    /**
     * Update an existing file using a stream.
     *
     * @param string $path The path of the existing file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     * @throws FileNotFoundException
     *
     * @throws InvalidArgumentException If $resource is not a file handle.
     */
    public function updateStream($path, $resource, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->updateStream($path, $resource, $config);
    }

    /**
     * Rename a file.
     *
     * @param string $path Path to the existing file.
     * @param string $newpath The new path of the file.
     *
     * @return bool True on success, false on failure.
     * @throws FileNotFoundException Thrown if $path does not exist.
     *
     * @throws FileExistsException   Thrown if $newpath exists.
     */
    public function rename($path, $newpath)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->rename($path, $newpath);
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool True on success, false on failure.
     * @throws RootViolationException Thrown if $dirname is empty.
     *
     */
    public function deleteDir($dirname)
    {
        list($prefix, $dirname) = $this->getPrefixAndPath($dirname);

        return $this->getFilesystem($prefix)->deleteDir($dirname);
    }

    /**
     * Create a directory.
     *
     * @param string $dirname The name of the new directory.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function createDir($dirname, array $config = [])
    {
        list($prefix, $dirname) = $this->getPrefixAndPath($dirname);

        return $this->getFilesystem($prefix)->createDir($dirname);
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path The path to the file.
     * @param string $visibility One of 'public' or 'private'.
     *
     * @return bool True on success, false on failure.
     * @throws FileNotFoundException
     *
     */
    public function setVisibility($path, $visibility)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->setVisibility($path, $visibility);
    }

    /**
     * Create a file or update if exists.
     *
     * @param string $path The path to the file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function put($path, $contents, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->put($path, $contents, $config);
    }

    /**
     * Create a file or update if exists.
     *
     * @param string $path The path to the file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     * @throws InvalidArgumentException Thrown if $resource is not a resource.
     *
     */
    public function putStream($path, $resource, array $config = [])
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->putStream($path, $resource, $config);
    }

    /**
     * Read and delete a file.
     *
     * @param string $path The path to the file.
     *
     * @return string|false The file contents, or false on failure.
     * @throws FileNotFoundException
     *
     */
    public function readAndDelete($path)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->readAndDelete($path);
    }

    /**
     * Get a file/directory handler.
     *
     * @param string $path The path to the file.
     * @param Handler $handler An optional existing handler to populate.
     *
     * @return Handler Either a file or directory handler.
     * @deprecated
     *
     */
    public function get($path, Handler $handler = null)
    {
        list($prefix, $path) = $this->getPrefixAndPath($path);

        return $this->getFilesystem($prefix)->get($path);
    }
}
