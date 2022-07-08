<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Grade extends DataTransferObject
{
    /** @var integer */
    public $courseid;

    /** @var null|string */
    public $grade;

    /** @var null|string */
    public $rawgrade;
}
