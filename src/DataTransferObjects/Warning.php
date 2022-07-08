<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Warning extends DataTransferObject
{
    /** @var string */
    public $item;

    /** @var integer */
    public $itemid;

    /** @var string */
    public $warningcode;

    /** @var string */
    public $message;
}
