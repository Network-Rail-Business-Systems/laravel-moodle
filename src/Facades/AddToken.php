<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Facades;

class AddToken extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NetworkRailBusinessSystems\LaravelMoodle\Support\AddToken::class;
    }
}
