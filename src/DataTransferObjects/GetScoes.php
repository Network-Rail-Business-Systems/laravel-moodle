<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetScoes extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Scoe[] */
    public $scoes;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;

    public function getSco()
    {
        return collect($this->scoes)->firstWhere('scormtype', '=', 'sco');
    }
}
