<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

use Illuminate\Support\Carbon;

trait HasDates
{
    public function asDate(string $field)
    {
        return Carbon::parse($this->{$field});
    }

    public function dates()
    {
        $dateObject = new \stdClass();

        foreach ($this->dates as $date) {
            $dateObject->{$date} = Carbon::parse($this->{$date});
        }

        return $dateObject;
    }
}
