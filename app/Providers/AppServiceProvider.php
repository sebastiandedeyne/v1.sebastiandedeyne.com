<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Spatie\BladeX\Facades\BladeX;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BladeX::component('components.*');

        Collection::macro('enumerate', function (string $glue, string $lastGlue) {
            if ($this->count() > 3) {
                return $this->implode($lastGlue);
            }

            $lastItem = $this->pop();

            return $this->implode($glue) . $lastGlue . $lastItem;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
