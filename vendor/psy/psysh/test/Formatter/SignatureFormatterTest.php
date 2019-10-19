<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Test\Formatter;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psy\Formatter\SignatureFormatter;
use Psy\Reflection\ReflectionClassConstant;
use Psy\Reflection\ReflectionConstant_;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;
use ReflectionProperty;
use Reflector;
use function defined;
use function strip_tags;

class SignatureFormatterTest extends TestCase
{
    const FOO = 'foo value';
    private static $bar = 'bar value';

    /**
     * @dataProvider signatureReflectors
     */
    public function testFormat($reflector, $expected)
    {
        $this->assertSame($expected, strip_tags(SignatureFormatter::format($reflector)));
    }

    public function signatureReflectors()
    {
        return [
            [
                new ReflectionFunction('implode'),
                defined('HHVM_VERSION') ? 'function implode($arg1, $arg2 = null)' : 'function implode($glue, $pieces)',
            ],
            [
                ReflectionClassConstant::create($this, 'FOO'),
                'const FOO = "foo value"',
            ],
            [
                new ReflectionMethod($this, 'someFakeMethod'),
                'private function someFakeMethod(array $one, $two = \'TWO\', Reflector $three = null)',
            ],
            [
                new ReflectionProperty($this, 'bar'),
                'private static $bar',
            ],
            [
                new ReflectionClass('Psy\CodeCleaner\CodeCleanerPass'),
                'abstract class Psy\CodeCleaner\CodeCleanerPass '
                . 'extends PhpParser\NodeVisitorAbstract '
                . 'implements PhpParser\NodeVisitor',
            ],
            [
                new ReflectionFunction('array_chunk'),
                'function array_chunk($arg, $size, $preserve_keys = unknown)',
            ],
            [
                new ReflectionClass('Psy\Test\Formatter\Fixtures\BoringTrait'),
                'trait Psy\Test\Formatter\Fixtures\BoringTrait',
            ],
            [
                new ReflectionMethod('Psy\Test\Formatter\Fixtures\BoringTrait', 'boringMethod'),
                'public function boringMethod($one = 1)',
            ],
            [
                new ReflectionConstant_('E_ERROR'),
                'define("E_ERROR", 1)',
            ],
            [
                new ReflectionConstant_('PHP_VERSION'),
                'define("PHP_VERSION", "' . PHP_VERSION . '")',
            ],
            [
                new ReflectionConstant_('__LINE__'),
                'define("__LINE__", null)', // @todo show this as `unknown` in red or something?
            ],
        ];
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSignatureFormatterThrowsUnknownReflectorExpeption()
    {
        $refl = $this->getMockBuilder('Reflector')->getMock();
        SignatureFormatter::format($refl);
    }

    private function someFakeMethod(array $one, $two = 'TWO', Reflector $three = null)
    {
    }
}
