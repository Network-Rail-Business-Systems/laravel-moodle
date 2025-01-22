<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseModuleById extends FlexibleDataTransferObject
{
    public CourseModule $cm;

    public array $warnings;
}
