<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Framework\Constraint;

use Countable;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use function preg_replace;
use function sprintf;

abstract class ConstraintTestCase extends TestCase
{
    final public function testIsCountable(): void
    {
        $className = $this->className();

        $reflection = new ReflectionClass($className);

        $this->assertTrue($reflection->implementsInterface(Countable::class), sprintf(
            'Failed to assert that "%s" implements "%s".',
            $className,
            Countable::class
        ));
    }

    /**
     * Returns the class name of the constraint.
     */
    final protected function className(): string
    {
        return preg_replace(
            '/Test$/',
            '',
            static::class
        );
    }

    final public function testIsSelfDescribing(): void
    {
        $className = $this->className();

        $reflection = new ReflectionClass($className);

        $this->assertTrue($reflection->implementsInterface(SelfDescribing::class), sprintf(
            'Failed to assert that "%s" implements "%s".',
            $className,
            SelfDescribing::class
        ));
    }
}
