<?php

namespace Illuminate\Routing;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

class ViewController extends Controller
{
    /**
     * The view factory implementation.
     *
     * @var ViewFactory
     */
    protected $view;

    /**
     * Create a new controller instance.
     *
     * @param ViewFactory $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Invoke the controller method.
     *
     * @param array $args
     * @return View
     */
    public function __invoke(...$args)
    {
        [$view, $data] = array_slice($args, -2);

        return $this->view->make($view, $data);
    }
}
