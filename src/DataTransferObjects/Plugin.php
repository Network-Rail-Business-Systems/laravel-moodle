<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Plugin extends FlexibleDataTransferObject
{
    /** @var string */
    public $type;

    /** @var string */
    public $name;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileArea[] */
    public $fileareas;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\EditorFields[] */
    public $editorfields;
}
