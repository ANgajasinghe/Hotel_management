<?php

namespace Illuminate\Routing;

use BadMethodCallException;
use Closure;
use Illuminate\Support\Arr;
use InvalidArgumentException;

/**
 * @method Route get(string $uri, Closure|array|string|null $action = null)
 * @method Route post(string $uri, Closure|array|string|null $action = null)
 * @method Route put(string $uri, Closure|array|string|null $action = null)
 * @method Route delete(string $uri, Closure|array|string|null $action = null)
 * @method Route patch(string $uri, Closure|array|string|null $action = null)
 * @method Route options(string $uri, Closure|array|string|null $action = null)
 * @method Route any(string $uri, Closure|array|string|null $action = null)
 * @method RouteRegistrar as(string $value)
 * @method RouteRegistrar domain(string $value)
 * @method RouteRegistrar middleware(array|string|null $middleware)
 * @method RouteRegistrar name(string $value)
 * @method RouteRegistrar namespace(string $value)
 * @method RouteRegistrar prefix(string $prefix)
 * @method RouteRegistrar where(array $where)
 */
class RouteRegistrar
{
    /**
     * The router instance.
     *
     * @var Router
     */
    protected $router;

    /**
     * The attributes to pass on to the router.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The methods to dynamically pass through to the router.
     *
     * @var array
     */
    protected $passthru = [
        'get', 'post', 'put', 'patch', 'delete', 'options', 'any',
    ];

    /**
     * The attributes that can be set through this class.
     *
     * @var array
     */
    protected $allowedAttributes = [
        'as', 'domain', 'middleware', 'name', 'namespace', 'prefix', 'where',
    ];

    /**
     * The attributes that are aliased.
     *
     * @var array
     */
    protected $aliases = [
        'name' => 'as',
    ];

    /**
     * Create a new route registrar instance.
     *
     * @param Router $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Route a resource to a controller.
     *
     * @param string $name
     * @param string $controller
     * @param array $options
     * @return PendingResourceRegistration
     */
    public function resource($name, $controller, array $options = [])
    {
        return $this->router->resource($name, $controller, $this->attributes + $options);
    }

    /**
     * Create a route group with shared attributes.
     *
     * @param Closure|string $callback
     * @return void
     */
    public function group($callback)
    {
        $this->router->group($this->attributes, $callback);
    }

    /**
     * Register a new route with the given verbs.
     *
     * @param array|string $methods
     * @param string $uri
     * @param Closure|array|string|null $action
     * @return Route
     */
    public function match($methods, $uri, $action = null)
    {
        return $this->router->match($methods, $uri, $this->compileAction($action));
    }

    /**
     * Compile the action into an array including the attributes.
     *
     * @param Closure|array|string|null $action
     * @return array
     */
    protected function compileAction($action)
    {
        if (is_null($action)) {
            return $this->attributes;
        }

        if (is_string($action) || $action instanceof Closure) {
            $action = ['uses' => $action];
        }

        return array_merge($this->attributes, $action);
    }

    /**
     * Dynamically handle calls into the route registrar.
     *
     * @param string $method
     * @param array $parameters
     * @return Route|$this
     *
     * @throws BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, $this->passthru)) {
            return $this->registerRoute($method, ...$parameters);
        }

        if (in_array($method, $this->allowedAttributes)) {
            if ($method === 'middleware') {
                return $this->attribute($method, is_array($parameters[0]) ? $parameters[0] : $parameters);
            }

            return $this->attribute($method, $parameters[0]);
        }

        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', static::class, $method
        ));
    }

    /**
     * Register a new route with the router.
     *
     * @param string $method
     * @param string $uri
     * @param Closure|array|string|null $action
     * @return Route
     */
    protected function registerRoute($method, $uri, $action = null)
    {
        if (!is_array($action)) {
            $action = array_merge($this->attributes, $action ? ['uses' => $action] : []);
        }

        return $this->router->{$method}($uri, $this->compileAction($action));
    }

    /**
     * Set the value for a given attribute.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     *
     * @throws InvalidArgumentException
     */
    public function attribute($key, $value)
    {
        if (!in_array($key, $this->allowedAttributes)) {
            throw new InvalidArgumentException("Attribute [{$key}] does not exist.");
        }

        $this->attributes[Arr::get($this->aliases, $key, $key)] = $value;

        return $this;
    }
}
