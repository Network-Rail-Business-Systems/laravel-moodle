<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetCoursesByField extends FlexibleDataTransferObject
{
    /** @var Course[] */
    public array $courses;

    /** @var Warning[] */
    public array $warnings;
}
