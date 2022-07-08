<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FileArea extends DataTransferObject
{
    /** @var string */
    public $area;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\FileObject[] */
    public $files;
}
