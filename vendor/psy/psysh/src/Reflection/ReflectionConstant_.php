<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Reflection;

use InvalidArgumentException;
use Reflector;
use RuntimeException;
use function constant;
use function defined;
use function gettype;
use function in_array;
use function preg_replace;
use function sprintf;
use function strpos;

/**
 * Somehow the standard reflection library doesn't include constants.
 *
 * ReflectionConstant_ corrects that omission.
 *
 * Note: For backwards compatibility reasons, this class is named
 * ReflectionConstant_ rather than ReflectionConstant. It will be renamed in
 * v0.10.0.
 */
class ReflectionConstant_ implements Reflector
{
    private static $magicConstants = [
        '__LINE__',
        '__FILE__',
        '__DIR__',
        '__FUNCTION__',
        '__CLASS__',
        '__TRAIT__',
        '__METHOD__',
        '__NAMESPACE__',
        '__COMPILER_HALT_OFFSET__',
    ];
    public $name;
    private $value;

    /**
     * Construct a ReflectionConstant_ object.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;

        if (!defined($name) && !self::isMagicConstant($name)) {
            throw new InvalidArgumentException('Unknown constant: ' . $name);
        }

        if (!self::isMagicConstant($name)) {
            $this->value = @constant($name);
        }
    }

    public static function isMagicConstant($name)
    {
        return in_array($name, self::$magicConstants);
    }

    /**
     * Exports a reflection.
     *
     * @param string $name
     * @param bool $return pass true to return the export, as opposed to emitting it
     *
     * @return null|string
     */
    public static function export($name, $return = false)
    {
        $refl = new self($name);
        $value = $refl->getValue();

        $str = sprintf('Constant [ %s %s ] { %s }', gettype($value), $refl->getName(), $value);

        if ($return) {
            return $str;
        }

        echo $str . "\n";
    }

    /**
     * Gets the value of the constant.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Gets the constant name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the constant's docblock.
     *
     * @return false
     */
    public function getDocComment()
    {
        return false;
    }

    /**
     * Gets the namespace name.
     *
     * Returns '' when the constant is not namespaced.
     *
     * @return string
     */
    public function getNamespaceName()
    {
        if (!$this->inNamespace()) {
            return '';
        }

        return preg_replace('/\\\\[^\\\\]+$/', '', $this->name);
    }

    /**
     * Checks if this constant is defined in a namespace.
     *
     * @return bool
     */
    public function inNamespace()
    {
        return strpos($this->name, '\\') !== false;
    }

    /**
     * To string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Gets the constant's file name.
     *
     * Currently returns null, because if it returns a file name the signature
     * formatter will barf.
     */
    public function getFileName()
    {
        return;
        // return $this->class->getFileName();
    }

    /**
     * Get the code end line.
     *
     * @throws RuntimeException
     */
    public function getEndLine()
    {
        return $this->getStartLine();
    }

    /**
     * Get the code start line.
     *
     * @throws RuntimeException
     */
    public function getStartLine()
    {
        throw new RuntimeException('Not yet implemented because it\'s unclear what I should do here :)');
    }
}
