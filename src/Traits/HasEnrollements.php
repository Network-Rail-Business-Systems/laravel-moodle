<?php

namespace NRBusinessSystems\LaraMoodle\Traits;

trait HasEnrollements
{
    public function selfEnrol()
    {
        return collect($this->enrollmentmethods)->contains('self');
    }
}
