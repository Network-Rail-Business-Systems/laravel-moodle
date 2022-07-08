<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

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

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Assignment[] */
    public $assignments;
}
