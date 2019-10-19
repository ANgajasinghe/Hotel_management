<?php

namespace Illuminate\Validation;

use Closure;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class DatabasePresenceVerifier implements PresenceVerifierInterface
{
    /**
     * The database connection instance.
     *
     * @var ConnectionResolverInterface
     */
    protected $db;

    /**
     * The database connection to use.
     *
     * @var string
     */
    protected $connection;

    /**
     * Create a new database presence verifier.
     *
     * @param ConnectionResolverInterface $db
     * @return void
     */
    public function __construct(ConnectionResolverInterface $db)
    {
        $this->db = $db;
    }

    /**
     * Count the number of objects in a collection having the given value.
     *
     * @param string $collection
     * @param string $column
     * @param string $value
     * @param int|null $excludeId
     * @param string|null $idColumn
     * @param array $extra
     * @return int
     */
    public function getCount($collection, $column, $value, $excludeId = null, $idColumn = null, array $extra = [])
    {
        $query = $this->table($collection)->where($column, '=', $value);

        if (!is_null($excludeId) && $excludeId !== 'NULL') {
            $query->where($idColumn ?: 'id', '<>', $excludeId);
        }

        return $this->addConditions($query, $extra)->count();
    }

    /**
     * Get a query builder for the given table.
     *
     * @param string $table
     * @return Builder
     */
    public function table($table)
    {
        return $this->db->connection($this->connection)->table($table)->useWritePdo();
    }

    /**
     * Add the given conditions to the query.
     *
     * @param Builder $query
     * @param array $conditions
     * @return Builder
     */
    protected function addConditions($query, $conditions)
    {
        foreach ($conditions as $key => $value) {
            if ($value instanceof Closure) {
                $query->where(function ($query) use ($value) {
                    $value($query);
                });
            } else {
                $this->addWhere($query, $key, $value);
            }
        }

        return $query;
    }

    /**
     * Add a "where" clause to the given query.
     *
     * @param Builder $query
     * @param string $key
     * @param string $extraValue
     * @return void
     */
    protected function addWhere($query, $key, $extraValue)
    {
        if ($extraValue === 'NULL') {
            $query->whereNull($key);
        } elseif ($extraValue === 'NOT_NULL') {
            $query->whereNotNull($key);
        } elseif (Str::startsWith($extraValue, '!')) {
            $query->where($key, '!=', mb_substr($extraValue, 1));
        } else {
            $query->where($key, $extraValue);
        }
    }

    /**
     * Count the number of objects in a collection with the given values.
     *
     * @param string $collection
     * @param string $column
     * @param array $values
     * @param array $extra
     * @return int
     */
    public function getMultiCount($collection, $column, array $values, array $extra = [])
    {
        $query = $this->table($collection)->whereIn($column, $values);

        return $this->addConditions($query, $extra)->distinct()->count($column);
    }

    /**
     * Set the connection to be used.
     *
     * @param string $connection
     * @return void
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
}
