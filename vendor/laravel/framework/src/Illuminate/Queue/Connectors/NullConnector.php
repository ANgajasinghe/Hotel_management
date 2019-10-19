<?php

namespace Illuminate\Queue\Connectors;

use Illuminate\Contracts\Queue\Queue;
use Illuminate\Queue\NullQueue;

class NullConnector implements ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param array $config
     * @return Queue
     */
    public function connect(array $config)
    {
        return new NullQueue;
    }
}
