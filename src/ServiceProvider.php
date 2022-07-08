<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laravel-moodle.php' => config_path('laravel-moodle.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/config/laravel-moodle.php', 'laravel-moodle');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
