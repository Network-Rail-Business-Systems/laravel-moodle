<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetCoursesByField extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Course[] */
    public $courses;

    /** @var array */
    public $warnings;
}
