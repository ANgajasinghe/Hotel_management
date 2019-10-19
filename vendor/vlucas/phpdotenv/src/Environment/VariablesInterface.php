<?php

namespace Dotenv\Environment;

use ArrayAccess;
use InvalidArgumentException;

/**
 * This environment variables interface.
 */
interface VariablesInterface extends ArrayAccess
{
    /**
     * Determine if the environment is immutable.
     *
     * @return bool
     */
    public function isImmutable();

    /**
     * Tells whether environment variable has been defined.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name);

    /**
     * Get an environment variable.
     *
     * @param string $name
     *
     * @return string|null
     * @throws InvalidArgumentException
     *
     */
    public function get($name);

    /**
     * Set an environment variable.
     *
     * @param string $name
     * @param string|null $value
     *
     * @return void
     * @throws InvalidArgumentException
     *
     */
    public function set($name, $value = null);

    /**
     * Clear an environment variable.
     *
     * @param string $name
     *
     * @return void
     * @throws InvalidArgumentException
     *
     */
    public function clear($name);
}
