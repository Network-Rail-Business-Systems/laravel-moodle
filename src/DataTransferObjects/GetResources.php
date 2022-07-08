<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetResources extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Resource[] */
    public $resources;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
