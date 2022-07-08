<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Plugin extends DataTransferObject
{
    /** @var string */
    public $type;

    /** @var string */
    public $name;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\FileArea[] */
    public $fileareas;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\EditorFields[] */
    public $editorfields;
}
