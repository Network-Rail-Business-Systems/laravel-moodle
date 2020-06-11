<?php

namespace NRBusinessSystems\LaraMoodle\Facades;

class LaraMoodle extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NRBusinessSystems\LaraMoodle\LaraMoodle::class;
    }
}
