<?php

namespace Illuminate\Contracts\Broadcasting;

use Illuminate\Http\Request;

interface Broadcaster
{
    /**
     * Authenticate the incoming request for a given channel.
     *
     * @param Request $request
     * @return mixed
     */
    public function auth($request);

    /**
     * Return the valid authentication response.
     *
     * @param Request $request
     * @param mixed $result
     * @return mixed
     */
    public function validAuthenticationResponse($request, $result);

    /**
     * Broadcast the given event.
     *
     * @param array $channels
     * @param string $event
     * @param array $payload
     * @return void
     */
    public function broadcast(array $channels, $event, array $payload = []);
}
