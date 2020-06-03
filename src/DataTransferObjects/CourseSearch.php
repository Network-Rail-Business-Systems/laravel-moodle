<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseSearch extends DataTransferObject
{
    /** @var integer */
    public $total;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearchCourse[] */
    public $courses;

    /** @var array */
    public $warnings;
}
