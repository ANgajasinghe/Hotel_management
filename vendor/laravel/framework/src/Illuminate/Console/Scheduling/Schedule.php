<?php

namespace Illuminate\Console\Scheduling;

use DateTimeInterface;
use DateTimeZone;
use Illuminate\Console\Application;
use Illuminate\Container\Container;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\ProcessUtils;

class Schedule
{
    /**
     * All of the events on the schedule.
     *
     * @var Event[]
     */
    protected $events = [];

    /**
     * The event mutex implementation.
     *
     * @var EventMutex
     */
    protected $eventMutex;

    /**
     * The scheduling mutex implementation.
     *
     * @var SchedulingMutex
     */
    protected $schedulingMutex;

    /**
     * The timezone the date should be evaluated on.
     *
     * @var DateTimeZone|string
     */
    protected $timezone;

    /**
     * Create a new schedule instance.
     *
     * @param DateTimeZone|string|null $timezone
     * @return void
     */
    public function __construct($timezone = null)
    {
        $this->timezone = $timezone;

        $container = Container::getInstance();

        $this->eventMutex = $container->bound(EventMutex::class)
            ? $container->make(EventMutex::class)
            : $container->make(CacheEventMutex::class);

        $this->schedulingMutex = $container->bound(SchedulingMutex::class)
            ? $container->make(SchedulingMutex::class)
            : $container->make(CacheSchedulingMutex::class);
    }

    /**
     * Add a new Artisan command event to the schedule.
     *
     * @param string $command
     * @param array $parameters
     * @return Event
     */
    public function command($command, array $parameters = [])
    {
        if (class_exists($command)) {
            $command = Container::getInstance()->make($command)->getName();
        }

        return $this->exec(
            Application::formatCommandString($command), $parameters
        );
    }

    /**
     * Add a new command event to the schedule.
     *
     * @param string $command
     * @param array $parameters
     * @return Event
     */
    public function exec($command, array $parameters = [])
    {
        if (count($parameters)) {
            $command .= ' ' . $this->compileParameters($parameters);
        }

        $this->events[] = $event = new Event($this->eventMutex, $command, $this->timezone);

        return $event;
    }

    /**
     * Compile parameters for a command.
     *
     * @param array $parameters
     * @return string
     */
    protected function compileParameters(array $parameters)
    {
        return collect($parameters)->map(function ($value, $key) {
            if (is_array($value)) {
                $value = collect($value)->map(function ($value) {
                    return ProcessUtils::escapeArgument($value);
                })->implode(' ');
            } elseif (!is_numeric($value) && !preg_match('/^(-.$|--.*)/i', $value)) {
                $value = ProcessUtils::escapeArgument($value);
            }

            return is_numeric($key) ? $value : "{$key}={$value}";
        })->implode(' ');
    }

    /**
     * Add a new job callback event to the schedule.
     *
     * @param object|string $job
     * @param string|null $queue
     * @param string|null $connection
     * @return CallbackEvent
     */
    public function job($job, $queue = null, $connection = null)
    {
        return $this->call(function () use ($job, $queue, $connection) {
            $job = is_string($job) ? resolve($job) : $job;

            if ($job instanceof ShouldQueue) {
                dispatch($job)
                    ->onConnection($connection ?? $job->connection)
                    ->onQueue($queue ?? $job->queue);
            } else {
                dispatch_now($job);
            }
        })->name(is_string($job) ? $job : get_class($job));
    }

    /**
     * Add a new callback event to the schedule.
     *
     * @param string|callable $callback
     * @param array $parameters
     * @return CallbackEvent
     */
    public function call($callback, array $parameters = [])
    {
        $this->events[] = $event = new CallbackEvent(
            $this->eventMutex, $callback, $parameters
        );

        return $event;
    }

    /**
     * Determine if the server is allowed to run this event.
     *
     * @param Event $event
     * @param DateTimeInterface $time
     * @return bool
     */
    public function serverShouldRun(Event $event, DateTimeInterface $time)
    {
        return $this->schedulingMutex->create($event, $time);
    }

    /**
     * Get all of the events on the schedule that are due.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @return Collection
     */
    public function dueEvents($app)
    {
        return collect($this->events)->filter->isDue($app);
    }

    /**
     * Get all of the events on the schedule.
     *
     * @return Event[]
     */
    public function events()
    {
        return $this->events;
    }

    /**
     * Specify the cache store that should be used to store mutexes.
     *
     * @param string $store
     * @return $this
     */
    public function useCache($store)
    {
        if ($this->eventMutex instanceof CacheEventMutex) {
            $this->eventMutex->useStore($store);
        }

        if ($this->schedulingMutex instanceof CacheSchedulingMutex) {
            $this->schedulingMutex->useStore($store);
        }

        return $this;
    }
}
