<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EventCourse extends FlexibleDataTransferObject
{
    public int $id;

    public string $fullname;

    public string $shortname;

    public ?string $idnumber;

    public string $summary;

    public int $summaryformat;

    public int $startdate;

    public int $enddate;

    public bool $visible;

    public string $fullnamedisplay;

    public string $viewurl;

    public string $courseimage;

    public ?int $progress;

    public bool $hasprogress;

    public bool $isfavourite;

    public bool $hidden;

    public bool $showshortname;

    public string $coursecategory;
}
