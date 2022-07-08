<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseCompletion extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\CompletionStatus */
    public $completionstatus;

    /** @var array */
    public $warnings;
}
