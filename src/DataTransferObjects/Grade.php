<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Grade extends FlexibleDataTransferObject
{
    /** @var int */
    public $courseid;

    /** @var null|string */
    public $grade;

    /** @var null|string */
    public $rawgrade;
}
