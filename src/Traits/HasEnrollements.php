<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Traits;

trait HasEnrollements
{
    public function selfEnrol()
    {
        return collect($this->enrollmentmethods)->contains('self');
    }
}
