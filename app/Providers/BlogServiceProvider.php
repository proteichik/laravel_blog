<?php

namespace App\Providers;

use App\Http\Controllers\Admin\PostController;
use App\Model\BaseServiceInterface;
use App\Services\BaseService;
use App\Services\PostService;
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
                return new PostService($app['em'], 'App\Entity\Post');
            });

        $this->app->bind('CategoryService', function ($app) {
            return new BaseService($app['em'], 'App\Entity\Category');
        });
    }
    
}
