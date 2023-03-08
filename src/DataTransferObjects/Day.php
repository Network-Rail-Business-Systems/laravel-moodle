<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Day extends FlexibleDataTransferObject
{
    /** @var int */
    public $seconds;

    /** @var int */
    public $minutes;

    /** @var int */
    public $hours;

    /** @var int */
    public $mday;

    /** @var int */
    public $wday;

    /** @var int */
    public $year;

    /** @var int */
    public $yday;

    /** @var bool */
    public $istoday;

    /** @var bool */
    public $isweekend;

    /** @var int */
    public $timestamp;

    /** @var int */
    public $neweventtimestamp;

    /** @var string */
    public $viewdaylink;

    /** @var null|string */
    public $viewdaylinktitle;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Event[] */
    public $events;

    /** @var bool */
    public $hasevents;

    /** @var array */
    public $calendareventtypes;

    /** @var int */
    public $previousperiod;

    /** @var int */
    public $nextperiod;

    /** @var string */
    public $navigation;

    /** @var bool */
    public $haslastdayofevent;

    /** @var string */
    public $popovertitle;
}
