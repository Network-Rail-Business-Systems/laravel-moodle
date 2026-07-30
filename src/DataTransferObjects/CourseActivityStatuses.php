<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseActivityStatuses extends FlexibleDataTransferObject
{
    /** @var Statuses[] */
    public array $statuses;

    /** @var Warning[] */
    public array $warnings;
}
