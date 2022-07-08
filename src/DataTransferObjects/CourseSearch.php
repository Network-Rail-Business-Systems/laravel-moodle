<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseSearch extends DataTransferObject
{
    /** @var integer */
    public $total;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearchCourse[] */
    public $courses;

    /** @var array */
    public $warnings;
}
