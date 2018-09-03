<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CacheControl
{
    public function handle($request, Closure $next)
    {
        /** @var \Illuminate\Http\Response $response */
        $response = $next($request);

        if (! app()->environment('production')) {
            return $response;
        }

        if (! Auth::check()) {
            return $response;
        }

        if ($request->method() !== 'GET') {
            return $response;
        }

        $response->header->add('Cache-Control', 'max-age=1000, public');

        return $response;
    }
}
