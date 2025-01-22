<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CustomField extends FlexibleDataTransferObject
{
    public string $name;

    public string $shortname;

    public string $type;

    public ?string $value;
}
