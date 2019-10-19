<?php

namespace Illuminate\Routing;

use Symfony\Component\Routing\CompiledRoute;
use Symfony\Component\Routing\Route as SymfonyRoute;

class RouteCompiler
{
    /**
     * The route instance.
     *
     * @var Route
     */
    protected $route;

    /**
     * Create a new Route compiler instance.
     *
     * @param Route $route
     * @return void
     */
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Compile the route.
     *
     * @return CompiledRoute
     */
    public function compile()
    {
        $optionals = $this->getOptionalParameters();

        $uri = preg_replace('/\{(\w+?)\?\}/', '{$1}', $this->route->uri());

        return (
        new SymfonyRoute($uri, $optionals, $this->route->wheres, ['utf8' => true], $this->route->getDomain() ?: '')
        )->compile();
    }

    /**
     * Get the optional parameters for the route.
     *
     * @return array
     */
    protected function getOptionalParameters()
    {
        preg_match_all('/\{(\w+?)\?\}/', $this->route->uri(), $matches);

        return isset($matches[1]) ? array_fill_keys($matches[1], null) : [];
    }
}
