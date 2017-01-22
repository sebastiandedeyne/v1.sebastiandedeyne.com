<?php

namespace App\Providers;

use App\Content\ContentRepository;
use App\Http\ViewComposers\ErrorComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('errors.generic', ErrorComposer::class);
    }

    public function register()
    {
        $this->app->singleton(ContentRepository::class);
        $this->app->singleton(CommonMarkConverter::class);
    }
}
