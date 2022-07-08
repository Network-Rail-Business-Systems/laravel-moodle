<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SelfEnrol extends DataTransferObject
{
    /** @var boolean */
    public $status;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
