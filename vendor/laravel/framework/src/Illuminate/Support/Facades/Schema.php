<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Database\Schema\Builder;

/**
 * @method static Builder create(string $table, Closure $callback)
 * @method static Builder drop(string $table)
 * @method static Builder dropIfExists(string $table)
 * @method static Builder table(string $table, Closure $callback)
 * @method static Builder rename(string $from, string $to)
 * @method static void defaultStringLength(int $length)
 * @method static bool hasTable(string $table)
 * @method static bool hasColumn(string $table, string $column)
 * @method static bool hasColumns(string $table, array $columns)
 * @method static Builder disableForeignKeyConstraints()
 * @method static Builder enableForeignKeyConstraints()
 * @method static void registerCustomDoctrineType(string $class, string $name, string $type)
 *
 * @see \Illuminate\Database\Schema\Builder
 */
class Schema extends Facade
{
    /**
     * Get a schema builder instance for a connection.
     *
     * @param string|null $name
     * @return Builder
     */
    public static function connection($name)
    {
        return static::$app['db']->connection($name)->getSchemaBuilder();
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return Builder
     */
    protected static function getFacadeAccessor()
    {
        return static::$app['db']->connection()->getSchemaBuilder();
    }
}
