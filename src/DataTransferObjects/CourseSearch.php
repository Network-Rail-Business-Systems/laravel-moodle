<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseSearch extends FlexibleDataTransferObject
{
    /** @var integer */
    public $total;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseSearchCourse[] */
    public $courses;

    /** @var array */
    public $warnings;
}
