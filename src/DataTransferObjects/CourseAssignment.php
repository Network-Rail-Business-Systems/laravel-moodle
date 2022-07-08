<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

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

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Assignment[] */
    public $assignments;
}
