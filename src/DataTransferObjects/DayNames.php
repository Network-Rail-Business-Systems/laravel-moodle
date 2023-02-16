<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class DayNames extends FlexibleDataTransferObject
{
    /** @var integer */
    public $dayno;

    /** @var string */
    public $shortname;

    /** @var string */
    public $fullname;
}
