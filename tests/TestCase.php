<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use NetworkRailBusinessSystems\LaraMoodle\Tests\Stubs\User;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->artisan('migrate')->run();
        $this->artisan('ui:controllers')->run();

        Auth::routes();

        Config::set('laramoodle.user_model', User::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            'NetworkRailBusinessSystems\LaraMoodle\ServiceProvider',
            'NetworkRailBusinessSystems\LaraMoodle\AuthServiceProvider',
            'Laravel\Ui\UiServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaraMoodle' => 'NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle',
            'AddToken' => 'NetworkRailBusinessSystems\LaraMoodle\Facades\AddToken',
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
