<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2018 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Exception;

use PhpParser\Error;
use function sprintf;

/**
 * A "parse error" Exception for Psy.
 */
class ParseErrorException extends Error implements Exception
{
    /**
     * Constructor!
     *
     * @param string $message (default: "")
     * @param int $line (default: -1)
     */
    public function __construct($message = '', $line = -1)
    {
        $message = sprintf('PHP Parse error: %s', $message);
        parent::__construct($message, $line);
    }

    /**
     * Create a ParseErrorException from a PhpParser Error.
     *
     * @param Error $e
     *
     * @return ParseErrorException
     */
    public static function fromParseError(Error $e)
    {
        return new self($e->getRawMessage(), $e->getStartLine());
    }
}
