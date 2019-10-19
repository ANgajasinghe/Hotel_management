<?php

namespace Illuminate\Support\Facades;

use Closure;
use Illuminate\Routing\PendingResourceRegistration;
use Illuminate\Routing\Router;
use Illuminate\Routing\RouteRegistrar;

/**
 * @method static \Illuminate\Routing\Route get(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route post(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route put(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route delete(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route patch(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route options(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route any(string $uri, Closure|array|string|callable|null $action = null)
 * @method static \Illuminate\Routing\Route match(array|string $methods, string $uri, Closure|array|string|callable|null $action = null)
 * @method static RouteRegistrar prefix(string $prefix)
 * @method static RouteRegistrar where(array $where)
 * @method static PendingResourceRegistration resource(string $name, string $controller, array $options = [])
 * @method static PendingResourceRegistration apiResource(string $name, string $controller, array $options = [])
 * @method static void apiResources(array $resources)
 * @method static RouteRegistrar middleware(array|string|null $middleware)
 * @method static \Illuminate\Routing\Route substituteBindings(Route $route)
 * @method static void substituteImplicitBindings(Route $route)
 * @method static RouteRegistrar as(string $value)
 * @method static RouteRegistrar domain(string $value)
 * @method static RouteRegistrar name(string $value)
 * @method static RouteRegistrar namespace(string $value)
 * @method static Router|RouteRegistrar group(array|Closure|string $attributes, Closure|string $routes)
 * @method static \Illuminate\Routing\Route redirect(string $uri, string $destination, int $status = 302)
 * @method static \Illuminate\Routing\Route permanentRedirect(string $uri, string $destination)
 * @method static \Illuminate\Routing\Route view(string $uri, string $view, array $data = [])
 * @method static void bind(string $key, string|callable $binder)
 * @method static void model(string $key, string $class, Closure|null $callback = null)
 * @method static \Illuminate\Routing\Route current()
 * @method static string|null currentRouteName()
 * @method static string|null currentRouteAction()
 *
 * @see \Illuminate\Routing\Router
 */
class Route extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router';
    }
}
