<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SelfEnrol extends DataTransferObject
{
    /** @var boolean */
    public $status;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
