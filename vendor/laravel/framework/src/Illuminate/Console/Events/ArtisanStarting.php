<?php

namespace Illuminate\Console\Events;

use Illuminate\Console\Application;

class ArtisanStarting
{
    /**
     * The Artisan application instance.
     *
     * @var Application
     */
    public $artisan;

    /**
     * Create a new event instance.
     *
     * @param Application $artisan
     * @return void
     */
    public function __construct($artisan)
    {
        $this->artisan = $artisan;
    }
}
