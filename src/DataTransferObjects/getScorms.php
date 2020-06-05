<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class getScorms extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Scorm[] */
    public $scorms;

    public $warnings;
}
