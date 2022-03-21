<?php

namespace Jas\BlogWithComments;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Jas\BlogWithComments\BlogController');
        $this->app->make('Jas\BlogWithComments\FrontBlogController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations') ;
        $this->loadViewsFrom(__DIR__.'/views', 'bwc');

        $this->publishes([__DIR__.'/../../blogwithcomments' => resource_path('views/jas/blogwithcomments')]);
    }
}
