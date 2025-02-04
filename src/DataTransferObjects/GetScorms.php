<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetScorms extends FlexibleDataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Scorm[] */
    public array $scorms;

    public array $warnings;
}
