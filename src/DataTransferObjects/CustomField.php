<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CustomField extends FlexibleDataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $shortname;

    /** @var string */
    public $type;

    /** @var mixed|null|string */
    public $value;
}
