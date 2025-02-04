<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EditorFields extends FlexibleDataTransferObject
{
    public string $name;

    public string $description;

    public string $text;

    public int $format;
}
