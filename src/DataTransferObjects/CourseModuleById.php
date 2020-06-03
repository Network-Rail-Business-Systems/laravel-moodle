<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseModuleById extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseModule */
    public $cm;

    /** @var array */
    public $warnings;
}
