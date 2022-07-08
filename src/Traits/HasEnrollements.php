<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

trait HasEnrollements
{
    public function selfEnrol()
    {
        return collect($this->enrollmentmethods)->contains('self');
    }
}
