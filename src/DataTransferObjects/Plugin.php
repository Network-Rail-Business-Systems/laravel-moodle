<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Plugin extends DataTransferObject
{
    /** @var string */
    public $type;

    /** @var string */
    public $name;

    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\FileArea[] */
    public $fileareas;

    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\EditorFields[] */
    public $editorfields;
}
