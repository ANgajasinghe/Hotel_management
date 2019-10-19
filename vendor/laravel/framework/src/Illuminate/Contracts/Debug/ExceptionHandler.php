<?php

namespace Illuminate\Contracts\Debug;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Response;

interface ExceptionHandler
{
    /**
     * Report or log an exception.
     *
     * @param Exception $e
     * @return void
     */
    public function report(Exception $e);

    /**
     * Determine if the exception should be reported.
     *
     * @param Exception $e
     * @return bool
     */
    public function shouldReport(Exception $e);

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $e
     * @return Response
     */
    public function render($request, Exception $e);

    /**
     * Render an exception to the console.
     *
     * @param OutputInterface $output
     * @param Exception $e
     * @return void
     */
    public function renderForConsole($output, Exception $e);
}
