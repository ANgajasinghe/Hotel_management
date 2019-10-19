<?php

namespace Illuminate\Contracts\Support;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param Request $request
     * @return Response
     */
    public function toResponse($request);
}
