<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Role extends FlexibleDataTransferObject
{
    /** @var int */
    public $roleid;

    /** @var string */
    public $name;

    /** @var string */
    public $shortname;

    /** @var int */
    public $sortorder;
}
