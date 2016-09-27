<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Request;

class BladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('sort_column', function ($name) {
            //ToDo....
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
