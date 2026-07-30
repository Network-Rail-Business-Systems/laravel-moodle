<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;

class AddToken extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NetworkRailBusinessSystems\LaravelMoodle\Support\AddToken::class;
    }
}
