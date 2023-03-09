<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseAssignment extends FlexibleDataTransferObject
{
    /** @var int */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;

    /** @var int */
    public $timemodified;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Assignment[] */
    public $assignments;
}
