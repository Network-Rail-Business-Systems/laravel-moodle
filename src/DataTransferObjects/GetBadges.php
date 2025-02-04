<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetBadges extends FlexibleDataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Badge[] */
    public array $badges;

    /** @var array */
    public array $warnings;
}
