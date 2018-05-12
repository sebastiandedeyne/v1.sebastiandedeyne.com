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
            $time = 24 * 60 * 60;

            $response->header('Cache-Control', "max-age={$time}, public");
        }

        return $response;
    }
}
