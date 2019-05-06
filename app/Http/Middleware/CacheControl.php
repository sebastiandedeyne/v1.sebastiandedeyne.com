<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
{
    public function handle($request, Closure $next)
    {
        /** @var \Illuminate\Http\Response $response */
        $response = $next($request);

        if (! app()->environment('production')) {
            return $response;
        }

        if ($request->method() !== 'GET') {
            return $response;
        }

        $response->headers->add(['Cache-Control' => 'max-age=300, public']);

        return $response;
    }
}
