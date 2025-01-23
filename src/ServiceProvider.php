<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Middleware\MoodleToken;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        parent::register();

        app('router')->aliasMiddleware('laravel-moodle', MoodleToken::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/laravel-moodle.php' => config_path('laravel-moodle.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/config/laravel-moodle.php', 'laravel-moodle');
    }
}
