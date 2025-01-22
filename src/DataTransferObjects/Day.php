<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Day extends FlexibleDataTransferObject
{
    public int $seconds;

    public int $minutes;

    public int $hours;

    public int $mday;

    public int $wday;

    public int $year;

    public int $yday;

    public bool $istoday;

    public bool $isweekend;

    public int $timestamp;

    public int $neweventtimestamp;

    public string $viewdaylink;

    public ?string $viewdaylinktitle;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Event[] */
    public ?array $events;

    public bool $hasevents;

    public array $calendareventtypes;

    public int $previousperiod;

    public int $nextperiod;

    public string $navigation;

    public bool $haslastdayofevent;

    public string $popovertitle;
}
