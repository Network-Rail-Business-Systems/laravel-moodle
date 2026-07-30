<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Plugin extends FlexibleDataTransferObject
{
    public string $type;

    public string $name;

    /** @var FileArea[]|null */
    public ?array $fileareas;

    /** @var EditorFields[]|null */
    public ?array $editorfields;
}
