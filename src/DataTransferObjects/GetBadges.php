<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetBadges extends FlexibleDataTransferObject
{
    /** @var Badge[] */
    public array $badges;

    /** @var Warning[] */
    public array $warnings;
}
