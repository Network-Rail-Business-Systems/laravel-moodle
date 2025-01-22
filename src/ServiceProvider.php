<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/laravel-moodle.php' => config_path('laravel-moodle.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/config/laravel-moodle.php', 'laravel-moodle');
    }
}
