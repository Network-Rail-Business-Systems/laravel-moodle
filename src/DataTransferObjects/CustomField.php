<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CustomField extends DataTransferObject
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
