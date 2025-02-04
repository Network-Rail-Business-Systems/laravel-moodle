<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use NetworkRailBusinessSystems\LaravelMoodle\LaravelMoodle as BaseLaravelMoodle;

/**
 * @mixin BaseLaravelMoodle
 */
class LaravelMoodle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BaseLaravelMoodle::class;
    }
}
