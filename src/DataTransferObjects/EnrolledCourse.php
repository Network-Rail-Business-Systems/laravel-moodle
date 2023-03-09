<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EnrolledCourse extends FlexibleDataTransferObject
{
    /** @var int */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;
}
