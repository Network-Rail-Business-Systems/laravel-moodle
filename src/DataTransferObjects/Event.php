<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Event extends FlexibleDataTransferObject
{
    public int $id;

    public string $name;

    public string $description;

    public int $descriptionformat;

    public string $location;

    public ?int $categoryid;

    public ?int $groupid;

    public int $userid;

    public ?int $repeatid;

    public ?int $eventcount;

    public ?string $component;

    public string $modulename;

    public int $instance;

    public string $eventtype;

    public int $timestart;

    public int $timeduration;

    public int $timesort;

    public int $visible;

    public int $timemodified;

    public array $icon;

    public ?EventCourse $course;

    public array $subscription;

    public bool $canedit;

    public bool $candelete;

    public string $deleteurl;

    public string $editurl;

    public string $viewurl;

    public string $formattedtime;

    public bool $isactionevent;

    public ?array $action;

    public bool $iscourseevent;

    public bool $iscategoryevent;

    public ?string $groupname;

    public string $normalisedeventtype;

    public string $normalisedeventtypetext;

    public string $url;

    public bool $islastday;

    public string $popupname;

    public ?int $mindaytimestamp;

    public ?string $mindayerror;

    public ?int $maxdaytimestamp;

    public ?string $maxdayerror;

    public bool $draggable;
}
