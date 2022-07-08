<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class EnrolledCourse extends DataTransferObject
{
    /** @var integer */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;
}
