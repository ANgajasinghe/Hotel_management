<?php

namespace Illuminate\Database\Events;

use Illuminate\Database\Connection;

abstract class ConnectionEvent
{
    /**
     * The name of the connection.
     *
     * @var string
     */
    public $connectionName;

    /**
     * The database connection instance.
     *
     * @var Connection
     */
    public $connection;

    /**
     * Create a new event instance.
     *
     * @param Connection $connection
     * @return void
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->connectionName = $connection->getName();
    }
}
