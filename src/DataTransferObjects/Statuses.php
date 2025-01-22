<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Statuses extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timecompleted'];

    public int $cmid;

    public string $modname;

    public int $instance;

    public int $state;

    public int $timecompleted;

    public int $tracking;

    public mixed $overrideby;

    public bool $valueused;
}
