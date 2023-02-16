<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Completion extends FlexibleDataTransferObject
{
    /** @var integer */
    public $type;

    /** @var string */
    public $title;

    /** @var string */
    public $status;

    /** @var boolean */
    public $complete;

    /** @var mixed|null|integer */
    public $timecompleted;

    /** @var array */
    public $details;
}
