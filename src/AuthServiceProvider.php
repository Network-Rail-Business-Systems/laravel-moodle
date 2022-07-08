<?php

namespace NetworkRailBusinessSystems\LaraMoodle;

use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends \Illuminate\Foundation\Support\Providers\AuthServiceProvider
{
    public function boot()
    {
        Auth::provider('moodle', function ($app, array $config) {
            return new MoodleUserProvider();
        });
    }
}
