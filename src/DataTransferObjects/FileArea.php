<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class FileArea extends FlexibleDataTransferObject
{
    public string $area;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $files;
}
