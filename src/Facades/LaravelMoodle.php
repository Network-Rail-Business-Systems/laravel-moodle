<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Facades;

class LaravelMoodle extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NetworkRailBusinessSystems\LaravelMoodle\LaravelMoodle::class;
    }
}
