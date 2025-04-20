<?php

namespace Dwoodard\A2A;

use Illuminate\Support\ServiceProvider;

class LaravelAgentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/a2a.php', 'a2a');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/a2a.php' => config_path('a2a.php'),
        ], 'a2a-config');

        $this->loadRoutesFrom(__DIR__.'/../routes/a2a.php');
    }
}
