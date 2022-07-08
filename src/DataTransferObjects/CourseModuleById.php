<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseModuleById extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\CourseModule */
    public $cm;

    /** @var array */
    public $warnings;
}
