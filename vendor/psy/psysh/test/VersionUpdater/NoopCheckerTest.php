<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Test\VersionUpdater;

use PHPUnit\Framework\TestCase;
use Psy\Shell;
use Psy\VersionUpdater\NoopChecker;

class NoopCheckerTest extends TestCase
{
    public function testTheThings()
    {
        $checker = new NoopChecker();
        $this->assertTrue($checker->isLatest());
        $this->assertEquals(Shell::VERSION, $checker->getLatest());
    }
}
