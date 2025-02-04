<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetCourseAssignments extends FlexibleDataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseAssignment[] */
    public array $courses;

    /** @var array */
    public array $warnings;
}
