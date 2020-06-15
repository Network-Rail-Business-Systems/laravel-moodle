<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetCourseAssignments extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseAssignment[] */
    public $courses;

    /** @var array */
    public $warnings;
}
