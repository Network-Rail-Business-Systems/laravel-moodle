<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FileArea extends DataTransferObject
{
    /** @var string */
    public $area;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\FileObject[] */
    public $files;
}
