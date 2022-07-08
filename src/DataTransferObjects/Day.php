<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Day extends DataTransferObject
{
    /** @var integer */
    public $seconds;

    /** @var integer */
    public $minutes;

    /** @var integer */
    public $hours;

    /** @var integer */
    public $mday;

    /** @var integer */
    public $wday;

    /** @var integer */
    public $year;

    /** @var integer */
    public $yday;

    /** @var boolean */
    public $istoday;

    /** @var boolean */
    public $isweekend;

    /** @var integer */
    public $timestamp;

    /** @var integer */
    public $neweventtimestamp;

    /** @var string */
    public $viewdaylink;

    /** @var null|string */
    public $viewdaylinktitle;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Event[] */
    public $events;

    /** @var boolean */
    public $hasevents;

    /** @var array */
    public $calendareventtypes;

    /** @var integer */
    public $previousperiod;

    /** @var integer */
    public $nextperiod;

    /** @var string */
    public $navigation;

    /** @var boolean */
    public $haslastdayofevent;

    /** @var string */
    public $popovertitle;
}
