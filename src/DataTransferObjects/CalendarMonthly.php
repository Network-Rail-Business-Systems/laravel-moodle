<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CalendarMonthly extends FlexibleDataTransferObject
{
    public string $url;

    public int $courseid;

    public int $categoryid;

    public string $filter_selector;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Week[] */
    public array $weeks;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\DayNames[] */
    public array $daynames;

    public string $view;

    public array $date;

    public string $periodname;

    public bool $includenavigation;

    public bool $initialeventsloaded;

    public array $previousperiod;

    public string $previousperiodlink;

    public string $previousperiodname;

    public array $nextperiod;

    public string $nextperiodname;

    public string $nextperiodlink;

    public string $larrow;

    public string $rarrow;

    public int $defaulteventcontext;
}
