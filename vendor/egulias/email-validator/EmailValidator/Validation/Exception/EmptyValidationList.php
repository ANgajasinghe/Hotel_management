<?php

namespace Egulias\EmailValidator\Validation\Exception;

use Exception;
use InvalidArgumentException;

class EmptyValidationList extends InvalidArgumentException
{
    public function __construct($code = 0, Exception $previous = null)
    {
        parent::__construct("Empty validation list is not allowed", $code, $previous);
    }
}
