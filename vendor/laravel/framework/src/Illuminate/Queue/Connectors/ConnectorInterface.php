<?php

namespace Illuminate\Queue\Connectors;

use Illuminate\Contracts\Queue\Queue;

interface ConnectorInterface
{
    /**
     * Establish a queue connection.
     *
     * @param array $config
     * @return Queue
     */
    public function connect(array $config);
}
