<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class AssignmentConfig extends DataTransferObject
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
