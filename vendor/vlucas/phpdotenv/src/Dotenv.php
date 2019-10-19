<?php

namespace Dotenv;

use Dotenv\Environment\DotenvFactory;
use Dotenv\Environment\FactoryInterface;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;

/**
 * This is the dotenv class.
 *
 * It's responsible for loading a `.env` file in the given directory and
 * setting the environment variables.
 */
class Dotenv
{
    /**
     * The loader instance.
     *
     * @var Loader
     */
    protected $loader;

    /**
     * Create a new dotenv instance.
     *
     * @param Loader $loader
     *
     * @return void
     */
    public function __construct(Loader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * Create a new dotenv instance.
     *
     * @param string|string[] $paths
     * @param string|null $file
     * @param FactoryInterface|null $envFactory
     *
     * @return Dotenv
     */
    public static function create($paths, $file = null, FactoryInterface $envFactory = null)
    {
        $loader = new Loader(
            self::getFilePaths((array)$paths, $file ?: '.env'),
            $envFactory ?: new DotenvFactory(),
            true
        );

        return new self($loader);
    }

    /**
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string $file
     *
     * @return string[]
     */
    private static function getFilePaths(array $paths, $file)
    {
        return array_map(function ($path) use ($file) {
            return rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file;
        }, $paths);
    }

    /**
     * Load environment file in given directory.
     *
     * @return array<string|null>
     * @throws InvalidPathException|InvalidFileException
     *
     */
    public function load()
    {
        return $this->loadData();
    }

    /**
     * Actually load the data.
     *
     * @param bool $overload
     *
     * @return array<string|null>
     * @throws InvalidPathException|InvalidFileException
     *
     */
    protected function loadData($overload = false)
    {
        return $this->loader->setImmutable(!$overload)->load();
    }

    /**
     * Load environment file in given directory, silently failing if it doesn't exist.
     *
     * @return array<string|null>
     * @throws InvalidFileException
     *
     */
    public function safeLoad()
    {
        try {
            return $this->loadData();
        } catch (InvalidPathException $e) {
            // suppressing exception
            return [];
        }
    }

    /**
     * Load environment file in given directory.
     *
     * @return array<string|null>
     * @throws InvalidPathException|InvalidFileException
     *
     */
    public function overload()
    {
        return $this->loadData(true);
    }

    /**
     * Required ensures that the specified variables exist, and returns a new validator object.
     *
     * @param string|string[] $variables
     *
     * @return Validator
     */
    public function required($variables)
    {
        return new Validator((array)$variables, $this->loader);
    }

    /**
     * Get the list of environment variables declared inside the 'env' file.
     *
     * @return string[]
     */
    public function getEnvironmentVariableNames()
    {
        return $this->loader->getEnvironmentVariableNames();
    }
}
