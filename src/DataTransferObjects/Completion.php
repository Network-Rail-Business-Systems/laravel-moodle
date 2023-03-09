<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Completion extends FlexibleDataTransferObject
{
    /** @var int */
    public $type;

    /** @var string */
    public $title;

    /** @var string */
    public $status;

    /** @var bool */
    public $complete;

    /** @var mixed|null|int */
    public $timecompleted;

    /** @var array */
    public $details;
}
