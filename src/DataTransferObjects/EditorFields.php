<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EditorFields extends FlexibleDataTransferObject
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
