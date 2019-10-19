<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Command;

use PHPUnit\Framework\TestCase;
use Psy\Command\ExitCommand;
use Psy\Exception\BreakException;
use Symfony\Component\Console\Tester\CommandTester;

class ExitCommandTest extends TestCase
{
    /**
     * @expectedException BreakException
     * @expectedExceptionMessage Goodbye
     */
    public function testExecute()
    {
        $command = new ExitCommand();
        $tester = new CommandTester($command);
        $tester->execute([]);
    }
}
