<?php

namespace JM\Viewable;

use Illuminate\Support\ServiceProvider;

class ViewableServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/viewable.php', 'viewable'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/viewable.php' => config_path('viewable.php'),
        ], 'viewable-config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
