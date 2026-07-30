<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseSearch extends FlexibleDataTransferObject
{
    public int $total;

    /** @var CourseSearchCourse[] */
    public array $courses;

    /** @var Warning[] */
    public array $warnings;
}
