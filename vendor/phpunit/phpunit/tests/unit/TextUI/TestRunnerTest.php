<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\TextUI;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use Success;

class TestRunnerTest extends TestCase
{
    public function testTestIsRunnable(): void
    {
        $runner = new TestRunner;
        $runner->setPrinter($this->getResultPrinterMock());
        $runner->doRun(new Success, ['filter' => 'foo'], false);
    }

    /**
     * @return ResultPrinter
     */
    private function getResultPrinterMock()
    {
        return $this->createMock(ResultPrinter::class);
    }

    public function testSuiteIsRunnable(): void
    {
        $runner = new TestRunner;
        $runner->setPrinter($this->getResultPrinterMock());
        $runner->doRun($this->getSuiteMock(), ['filter' => 'foo'], false);
    }

    /**
     * @return TestSuite
     */
    private function getSuiteMock()
    {
        $suite = $this->createMock(TestSuite::class);
        $suite->expects($this->once())->method('injectFilter');
        $suite->expects($this->once())->method('run');

        return $suite;
    }
}
