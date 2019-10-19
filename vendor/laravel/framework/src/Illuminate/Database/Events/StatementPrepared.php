<?php

namespace Illuminate\Database\Events;

use Illuminate\Database\Connection;
use PDOStatement;

class StatementPrepared
{
    /**
     * The database connection instance.
     *
     * @var Connection
     */
    public $connection;

    /**
     * The PDO statement.
     *
     * @var PDOStatement
     */
    public $statement;

    /**
     * Create a new event instance.
     *
     * @param Connection $connection
     * @param PDOStatement $statement
     * @return void
     */
    public function __construct($connection, $statement)
    {
        $this->statement = $statement;
        $this->connection = $connection;
    }
}
