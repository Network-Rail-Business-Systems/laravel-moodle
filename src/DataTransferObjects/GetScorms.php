<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetScorms extends FlexibleDataTransferObject
{
    /** @var Scorm[] */
    public array $scorms;

    /** @var Warning[] */
    public array $warnings;
}
