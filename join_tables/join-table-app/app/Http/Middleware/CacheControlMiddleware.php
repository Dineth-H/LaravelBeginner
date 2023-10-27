<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpFoundation\Response;

use Closure;

class CacheControlMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Cache-Control', 'max-age=86400, public');

        return $response;
    }
}