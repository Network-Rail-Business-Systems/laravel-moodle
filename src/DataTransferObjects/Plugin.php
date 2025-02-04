<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Plugin extends FlexibleDataTransferObject
{
    public string $type;

    public string $name;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileArea[]|null */
    public ?array $fileareas;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\EditorFields[]|null */
    public ?array $editorfields;
}
