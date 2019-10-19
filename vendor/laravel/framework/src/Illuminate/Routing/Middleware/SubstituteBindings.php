<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;

class SubstituteBindings
{
    /**
     * The router instance.
     *
     * @var Registrar
     */
    protected $router;

    /**
     * Create a new bindings substitutor.
     *
     * @param Registrar $router
     * @return void
     */
    public function __construct(Registrar $router)
    {
        $this->router = $router;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->router->substituteBindings($route = $request->route());

        $this->router->substituteImplicitBindings($route);

        return $next($request);
    }
}
