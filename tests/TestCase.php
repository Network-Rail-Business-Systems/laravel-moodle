<?php

namespace NRBusinessSystems\LaraMoodle\Tests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\User;
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
            'NRBusinessSystems\LaraMoodle\ServiceProvider',
            'NRBusinessSystems\LaraMoodle\AuthServiceProvider',
            'Laravel\Ui\UiServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaraMoodle' => 'NRBusinessSystems\LaraMoodle\Facades\LaraMoodle',
            'AddToken' => 'NRBusinessSystems\LaraMoodle\Facades\AddToken',
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
