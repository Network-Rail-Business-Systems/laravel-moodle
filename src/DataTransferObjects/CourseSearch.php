<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseSearch extends DataTransferObject
{
    /** @var integer */
    public $total;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseSearchCourse[] */
    public $courses;

    /** @var array */
    public $warnings;
}
