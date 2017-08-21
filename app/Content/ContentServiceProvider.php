<?php

namespace App\Content;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Posts::class);
        $this->app->singleton(OpenSource::class);
        $this->app->singleton(Blogroll::class);

        $this->app->singleton(CommonMarkConverter::class, function () {
            return new CommonMarkConverter();
        });
    }
}
