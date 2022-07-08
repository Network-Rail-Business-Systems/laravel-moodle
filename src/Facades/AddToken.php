<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Facades;

class AddToken extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NetworkRailBusinessSystems\LaraMoodle\Support\AddToken::class;
    }
}
