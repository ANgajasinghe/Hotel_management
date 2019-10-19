<?php
/* ===========================================================================
 * Copyright (c) 2018-2019 Zindex Software
 *
 * Licensed under the MIT License
 * =========================================================================== */

namespace Opis\Closure;

use SplObjectStorage;

/**
 * Closure scope class
 * @internal
 */
class ClosureScope extends SplObjectStorage
{
    /**
     * @var integer Number of serializations in current scope
     */
    public $serializations = 0;

    /**
     * @var integer Number of closures that have to be serialized
     */
    public $toserialize = 0;
}
