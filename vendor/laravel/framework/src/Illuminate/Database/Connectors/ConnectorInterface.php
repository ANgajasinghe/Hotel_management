<?php

namespace Illuminate\Database\Connectors;

use PDO;

interface ConnectorInterface
{
    /**
     * Establish a database connection.
     *
     * @param array $config
     * @return PDO
     */
    public function connect(array $config);
}
