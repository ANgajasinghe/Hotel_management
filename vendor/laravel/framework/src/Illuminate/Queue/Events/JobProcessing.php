<?php

namespace Illuminate\Queue\Events;

use Illuminate\Contracts\Queue\Job;

class JobProcessing
{
    /**
     * The connection name.
     *
     * @var string
     */
    public $connectionName;

    /**
     * The job instance.
     *
     * @var Job
     */
    public $job;

    /**
     * Create a new event instance.
     *
     * @param string $connectionName
     * @param Job $job
     * @return void
     */
    public function __construct($connectionName, $job)
    {
        $this->job = $job;
        $this->connectionName = $connectionName;
    }
}
