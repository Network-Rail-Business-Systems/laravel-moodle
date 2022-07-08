<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseActivityStatuses extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Statuses[] */
    public $statuses;

    /** @var array */
    public $warnings;
}
