<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class EditorFields extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var string */
    public $text;

    /** @var int */
    public $format;
}
