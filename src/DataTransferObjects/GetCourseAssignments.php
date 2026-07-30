<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetCourseAssignments extends FlexibleDataTransferObject
{
    /** @var CourseAssignment[] */
    public array $courses;

    /** @var Warning[] */
    public array $warnings;
}
