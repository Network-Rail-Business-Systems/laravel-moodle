<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetScoes extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Scoe[] */
    public $scoes;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public $warnings;

    public function getSco()
    {
        return collect($this->scoes)->firstWhere('scormtype', '=', 'sco');
    }
}
