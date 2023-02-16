<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Warning extends FlexibleDataTransferObject
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
