<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetScoes extends FlexibleDataTransferObject
{
    /** @var Scoe[] */
    public array $scoes;

    /** @var Warning[] */
    public array $warnings;

    public function getSco(): Scoe
    {
        return collect($this->scoes)->firstWhere('scormtype', '=', 'sco');
    }
}
