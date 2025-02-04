<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

use Illuminate\Support\Carbon;
use stdClass;

trait HasDates
{
    public function asDate(string $field): Carbon
    {
        return Carbon::parse($this->{$field});
    }

    public function dates(): stdClass
    {
        $dateObject = new stdClass();

        foreach ($this->dates as $date) {
            $dateObject->{$date} = Carbon::parse($this->{$date});
        }

        return $dateObject;
    }
}
