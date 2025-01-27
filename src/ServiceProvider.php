<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Support\Facades\Http;
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

        if (config('laravel-moodle.emulator_enabled') === true) {
            $this->startEmulator();
        }
    }

    protected function startEmulator(): void
    {
        Http::fake([
            '*/login/token.php*' => [
                'error' => false,
                'token' => 'abc123',
            ],
            '*core_user_get_users&moodlewsrestformat' => [
                'users' => [
                    'moodle_id' => 123,
                    'name' => 'Gandalf Stormcrow',
                    'email' => 'gandalf.stormcrow@example.com',
                    'title' => 'Wizard',
                    'business_area' => 'Isengard',
                    'office' => 'Rooftop',
                    'location' => 'Rohan',
                    'address' => '123 Fake Street',
                    'username' => 'gandalf',
                ]
            ],
        ]);
    }
}
