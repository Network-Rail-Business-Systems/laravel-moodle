<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class SelfEnrol extends FlexibleDataTransferObject
{
    public bool $status;

    /** @var Warning[] */
    public array $warnings;
}
