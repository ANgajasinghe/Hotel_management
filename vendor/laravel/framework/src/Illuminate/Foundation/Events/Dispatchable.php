<?php

namespace Illuminate\Foundation\Events;

use Illuminate\Broadcasting\PendingBroadcast;

trait Dispatchable
{
    /**
     * Dispatch the event with the given arguments.
     *
     * @return void
     */
    public static function dispatch()
    {
        return event(new static(...func_get_args()));
    }

    /**
     * Broadcast the event with the given arguments.
     *
     * @return PendingBroadcast
     */
    public static function broadcast()
    {
        return broadcast(new static(...func_get_args()));
    }
}
