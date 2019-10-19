<?php

namespace Illuminate\Routing;

class RouteFileRegistrar
{
    /**
     * The router instance.
     *
     * @var Router
     */
    protected $router;

    /**
     * Create a new route file registrar instance.
     *
     * @param Router $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Require the given routes file.
     *
     * @param string $routes
     * @return void
     */
    public function register($routes)
    {
        $router = $this->router;

        require $routes;
    }
}
