<?php

namespace Illuminate\Contracts\Console;

use Illuminate\Foundation\Bus\PendingDispatch;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface Kernel
{
    /**
     * Handle an incoming console command.
     *
     * @param InputInterface $input
     * @param OutputInterface|null $output
     * @return int
     */
    public function handle($input, $output = null);

    /**
     * Run an Artisan console command by name.
     *
     * @param string $command
     * @param array $parameters
     * @param OutputInterface|null $outputBuffer
     * @return int
     */
    public function call($command, array $parameters = [], $outputBuffer = null);

    /**
     * Queue an Artisan console command by name.
     *
     * @param string $command
     * @param array $parameters
     * @return PendingDispatch
     */
    public function queue($command, array $parameters = []);

    /**
     * Get all of the commands registered with the console.
     *
     * @return array
     */
    public function all();

    /**
     * Get the output for the last run command.
     *
     * @return string
     */
    public function output();

    /**
     * Terminate the application.
     *
     * @param InputInterface $input
     * @param int $status
     * @return void
     */
    public function terminate($input, $status);
}
