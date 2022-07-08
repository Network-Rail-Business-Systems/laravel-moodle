<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetBadges extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Badge[] */
    public $badges;

    /** @var array */
    public $warnings;
}
