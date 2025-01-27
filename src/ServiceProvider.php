<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Middleware\MoodleToken;

class ServiceProvider extends BaseServiceProvider
{
    const string EMULATOR_URL = 'http://moodle.test';

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
        config()->set('laravel-moodle.base_url', self::EMULATOR_URL);

        /** @var class-string<Model> $modelClass */
        $modelClass = config('laravel-moodle.user_model');

        $user = $modelClass::query()->firstOrCreate([
            'username' => 'gandalf',
        ], [
            'address' => '123 Fake Street',
            'business_area' => 'Isengard',
            'email' => 'gandalf.stormcrow@example.com',
            'location' => 'Rohan',
            'moodle_id' => 123,
            'name' => 'Gandalf Stormcrow',
            'office' => 'Rooftop',
            'title' => 'Wizard',
        ]);

        Http::fake([
            '*login/token*' => [
                'token' => 'abc123',
            ],
            '*core_user_get_users&moodlewsrestformat*' => [
                'users' => [
                    [
                        'address' => $user->address,
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'fullname' => $user->name,
                        'id' => $user->moodle_id,
                        'institution' => $user->office,
                        'username' => $user->username,
                    ],
                ],
            ],
        ])->baseUrl(self::EMULATOR_URL);
    }
}
