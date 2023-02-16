<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class AssignmentConfig extends FlexibleDataTransferObject
{
    /** @var string */
    public $plugin;

    /** @var string */
    public $subtype;

    /** @var string */
    public $name;

    /** @var integer|string */
    public $value;
}
