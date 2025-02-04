<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseSearch extends FlexibleDataTransferObject
{
    public int $total;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseSearchCourse[] */
    public array $courses;

    public array $warnings;
}
