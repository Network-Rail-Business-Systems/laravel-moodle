<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class DayNames extends DataTransferObject
{
    /** @var integer */
    public $dayno;

    /** @var string */
    public $shortname;

    /** @var string */
    public $fullname;
}
