<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Grade extends FlexibleDataTransferObject
{
    public int $courseid;

    public ?string $grade;

    public ?string $rawgrade;
}
