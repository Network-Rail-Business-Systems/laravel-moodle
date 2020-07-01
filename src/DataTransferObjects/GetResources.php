<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetResources extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Resource[] */
    public $resources;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
