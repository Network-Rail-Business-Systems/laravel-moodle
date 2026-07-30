<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class FileArea extends FlexibleDataTransferObject
{
    public string $area;

    /** @var FileObject[] */
    public array $files;
}
