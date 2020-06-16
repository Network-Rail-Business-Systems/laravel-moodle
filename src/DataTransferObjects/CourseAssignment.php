<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseAssignment extends DataTransferObject
{
    /** @var integer */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;

    /** @var integer */
    public $timemodified;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Assignment[] */
    public $assignments;
}