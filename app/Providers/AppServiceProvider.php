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
    }
}
