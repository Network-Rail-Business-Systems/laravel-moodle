<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Role extends FlexibleDataTransferObject
{
    public int $roleid;

    public string $name;

    public string $shortname;

    public int $sortorder;
}
