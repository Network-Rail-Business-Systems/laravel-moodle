<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseModuleById extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseModule */
    public $cm;

    /** @var array */
    public $warnings;
}
