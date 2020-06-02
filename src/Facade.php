<?php

namespace NRBusinessSystems\LaraMoodle;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return LaraMoodle::class;
    }
}
