<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Util;

use InvalidArgumentException;
use Psy\Exception\RuntimeException;
use Psy\Reflection\ReflectionClassConstant;
use Psy\Reflection\ReflectionConstant_;
use ReflectionClass;
use ReflectionFunction;
use ReflectionObject;
use Reflector;
use function class_exists;
use function defined;
use function function_exists;
use function get_class;
use function interface_exists;
use function is_object;
use function is_string;
use function sprintf;
use function trait_exists;

/**
 * A utility class for getting Reflectors.
 */
class Mirror
{
    const CONSTANT = 1;
    const METHOD = 2;
    const STATIC_PROPERTY = 4;
    const PROPERTY = 8;

    /**
     * Get a Reflector for a function, class or instance, constant, method or property.
     *
     * Optionally, pass a $filter param to restrict the types of members checked. For example, to only Reflectors for
     * static properties and constants, pass:
     *
     *    $filter = Mirror::CONSTANT | Mirror::STATIC_PROPERTY
     *
     * @param mixed $value Class or function name, or variable instance
     * @param string $member Optional: property, constant or method name (default: null)
     * @param int $filter (default: CONSTANT | METHOD | PROPERTY | STATIC_PROPERTY)
     *
     * @return Reflector
     * @throws RuntimeException when a $member specified but not present on $value
     * @throws InvalidArgumentException       if $value is something other than an object or class/function name
     *
     */
    public static function get($value, $member = null, $filter = 15)
    {
        if ($member === null && is_string($value)) {
            if (function_exists($value)) {
                return new ReflectionFunction($value);
            } elseif (defined($value) || ReflectionConstant_::isMagicConstant($value)) {
                return new ReflectionConstant_($value);
            }
        }

        $class = self::getClass($value);

        if ($member === null) {
            return $class;
        } elseif ($filter & self::CONSTANT && $class->hasConstant($member)) {
            return ReflectionClassConstant::create($value, $member);
        } elseif ($filter & self::METHOD && $class->hasMethod($member)) {
            return $class->getMethod($member);
        } elseif ($filter & self::PROPERTY && $class->hasProperty($member)) {
            return $class->getProperty($member);
        } elseif ($filter & self::STATIC_PROPERTY && $class->hasProperty($member) && $class->getProperty($member)->isStatic()) {
            return $class->getProperty($member);
        } else {
            throw new RuntimeException(sprintf(
                'Unknown member %s on class %s',
                $member,
                is_object($value) ? get_class($value) : $value
            ));
        }
    }

    /**
     * Get a ReflectionClass (or ReflectionObject) if possible.
     *
     * @param mixed $value
     *
     * @return ReflectionClass
     * @throws InvalidArgumentException if $value is not a class name or instance
     *
     */
    private static function getClass($value)
    {
        if (is_object($value)) {
            return new ReflectionObject($value);
        }

        if (!is_string($value)) {
            throw new InvalidArgumentException('Mirror expects an object or class');
        } elseif (!class_exists($value) && !interface_exists($value) && !trait_exists($value)) {
            throw new InvalidArgumentException('Unknown class or function: ' . $value);
        }

        return new ReflectionClass($value);
    }
}
