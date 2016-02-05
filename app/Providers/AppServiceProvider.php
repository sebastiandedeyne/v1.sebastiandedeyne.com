<?php

namespace App\Providers;

use App\Content\ContentRepository;
use Blade;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton(ContentRepository::class);
        $this->app->singleton(CommonMarkConverter::class);

        Blade::directive('production', function ($expression) {
            return "<php if (app()->environment('production')) : ?>";
        });

        Blade::directive('endproduction', function ($expression) {
            return "<php endif; ?>";
        });

        Blade::directive('local', function ($expression) {
            return "<php if (app()->environment('local')) : ?>";
        });

        Blade::directive('endlocal', function ($expression) {
            return "<php endif; ?>";
        });

        Blade::directive('debug', function ($expression) {
            return "<php if (config('app.debug')) : ?>";
        });

        Blade::directive('enddebug', function ($expression) {
            return "<php endif; ?>";
        });
    }
}
