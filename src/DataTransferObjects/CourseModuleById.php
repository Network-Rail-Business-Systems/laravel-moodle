<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseModuleById extends FlexibleDataTransferObject
{
    public CourseModule $cm;

    /** @var Warning[] */
    public array $warnings;
}
