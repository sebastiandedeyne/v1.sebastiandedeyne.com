<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware;

class MyRobots extends RobotsMiddleware
{
    protected function shouldIndex(Request $request)
    {
        return env('ALLOW_ROBOTS', true);
    }
}
