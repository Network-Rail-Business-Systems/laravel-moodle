<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CalendarMonthly extends FlexibleDataTransferObject
{
    /** @var string */
    public $url;

    /** @var int */
    public $courseid;

    /** @var int */
    public $categoryid;

    /** @var string */
    public $filter_selector;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Week[] */
    public $weeks;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\DayNames[] */
    public $daynames;

    /** @var string */
    public $view;

    /** @var array */
    public $date;

    /** @var string */
    public $periodname;

    /** @var bool */
    public $includenavigation;

    /** @var bool */
    public $initialeventsloaded;

    /** @var array */
    public $previousperiod;

    /** @var string */
    public $previousperiodlink;

    /** @var string */
    public $previousperiodname;

    /** @var array */
    public $nextperiod;

    /** @var string */
    public $nextperiodname;

    /** @var string */
    public $nextperiodlink;

    /** @var string */
    public $larrow;

    /** @var string */
    public $rarrow;

    /** @var int */
    public $defaulteventcontext;
}
