<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class JsonTest extends TestCase
{
    /**
     * @dataProvider canonicalizeProvider
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testCanonicalize($actual, $expected, $expectError): void
    {
        [$error, $canonicalized] = Json::canonicalize($actual);
        $this->assertEquals($expectError, $error);

        if (!$expectError) {
            $this->assertEquals($expected, $canonicalized);
        }
    }

    public function canonicalizeProvider(): array
    {
        return [
            ['{"name":"John","age":"35"}', '{"age":"35","name":"John"}', false],
            ['{"name":"John","age":"35","kids":[{"name":"Petr","age":"5"}]}', '{"age":"35","kids":[{"age":"5","name":"Petr"}],"name":"John"}', false],
            ['"name":"John","age":"35"}', '{"age":"35","name":"John"}', true],
        ];
    }

    /**
     * @dataProvider prettifyProvider
     *
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testPrettify($actual, $expected): void
    {
        $this->assertEquals($expected, Json::prettify($actual));
    }

    public function prettifyProvider(): array
    {
        return [
            ['{"name":"John","age": "5"}', "{\n    \"name\": \"John\",\n    \"age\": \"5\"\n}"],
            ['{"url":"https://www.example.com/"}', "{\n    \"url\": \"https://www.example.com/\"\n}"],
        ];
    }

    /**
     * @dataProvider prettifyExceptionProvider
     */
    public function testPrettifyException($json): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Cannot prettify invalid json');

        Json::prettify($json);
    }

    public function prettifyExceptionProvider(): array
    {
        return [
            ['"name":"John","age": "5"}'],
            [''],
        ];
    }
}
