<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use App\Model\BaseServiceInterface;
use App\Services\BaseService;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(PostController::class)
            ->needs(BaseServiceInterface::class)
            ->give(function ($app) {
                return new BaseService($app['em'], 'App\Entity\Post');
            });
    }
    
}
