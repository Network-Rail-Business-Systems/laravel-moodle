<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

trait HasEnrollements
{
    public function selfEnrol(): bool
    {
        return collect($this->enrollmentmethods)->contains('self');
    }
}
