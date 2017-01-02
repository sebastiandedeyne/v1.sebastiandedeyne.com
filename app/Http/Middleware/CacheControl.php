<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
{
    public function handle($request, Closure $next)
    {
        /** @var \Illuminate\Http\Response $response */
        $response = $next($request);

        if (app()->environment('production')) {
            $response->header('Cache-Control', 'max-age=1000, public');
        }

        return $response;
    }
}
