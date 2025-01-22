<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class AssignmentConfig extends FlexibleDataTransferObject
{
    public string $plugin;

    public string $subtype;

    public string $name;

    public string|int $value;
}
