<?php

namespace NRBusinessSystems\LaraMoodle\Facades;

class AddToken extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return \NRBusinessSystems\LaraMoodle\Support\AddToken::class;
    }
}
