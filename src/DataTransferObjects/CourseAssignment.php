<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseAssignment extends FlexibleDataTransferObject
{
    public int $id;

    public string $fullname;

    public string $shortname;

    public int $timemodified;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Assignment[] */
    public array $assignments;
}
