<?php

namespace Egulias\EmailValidator\Exception;

use InvalidArgumentException;

abstract class InvalidEmail extends InvalidArgumentException
{
    const REASON = "Invalid email";
    const CODE = 0;

    public function __construct()
    {
        parent::__construct(static::REASON, static::CODE);
    }
}
