<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Plugin extends DataTransferObject
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
