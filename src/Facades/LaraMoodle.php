<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Facades;

class LaraMoodle extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NetworkRailBusinessSystems\LaraMoodle\LaraMoodle::class;
    }
}
