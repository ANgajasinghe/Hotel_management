<?php

namespace Illuminate\Routing\Events;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RouteMatched
{
    /**
     * The route instance.
     *
     * @var Route
     */
    public $route;

    /**
     * The request instance.
     *
     * @var Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param Route $route
     * @param Request $request
     * @return void
     */
    public function __construct($route, $request)
    {
        $this->route = $route;
        $this->request = $request;
    }
}
