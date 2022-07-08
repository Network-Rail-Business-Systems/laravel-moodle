<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Role extends DataTransferObject
{
    /** @var integer */
    public $roleid;

    /** @var string */
    public $name;

    /** @var string */
    public $shortname;

    /** @var integer */
    public $sortorder;
}
