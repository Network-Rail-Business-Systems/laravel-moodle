<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Grade extends DataTransferObject
{
    /** @var integer */
    public $courseid;

    /** @var null|string */
    public $grade;

    /** @var null|integer */
    public $rawgrade;
}
