<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->artisan('migrate')->run();
        $this->artisan('ui:controllers')->run();

        Auth::routes();

        Config::set('laravel-moodle.user_model', User::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            'NetworkRailBusinessSystems\LaravelMoodle\ServiceProvider',
            'NetworkRailBusinessSystems\LaravelMoodle\AuthServiceProvider',
            'Laravel\Ui\UiServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelMoodle' => 'NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle',
            'AddToken' => 'NetworkRailBusinessSystems\LaravelMoodle\Facades\AddToken',
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $config = $app->make('config');

        $config->set([
            'auth.providers.users' => [
                'driver' => 'moodle',
                'model' => User::class,
            ],
        ]);
    }
}
