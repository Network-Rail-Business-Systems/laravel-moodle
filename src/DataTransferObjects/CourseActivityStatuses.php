<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseActivityStatuses extends FlexibleDataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Statuses[] */
    public $statuses;

    /** @var array */
    public $warnings;
}
