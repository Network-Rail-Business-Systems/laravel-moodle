<?php

namespace NetworkRailBusinessSystems\LaraMoodle;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laramoodle.php' => config_path('laramoodle.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/config/laramoodle.php', 'laramoodle');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
