<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SelfEnrol extends DataTransferObject
{
    /** @var integer */
    public $status;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
