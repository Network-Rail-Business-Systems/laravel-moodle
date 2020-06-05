<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetBadges extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Badge[] */
    public $badges;

    /** @var array */
    public $warnings;
}
