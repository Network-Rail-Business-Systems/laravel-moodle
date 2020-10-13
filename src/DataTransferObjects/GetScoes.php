<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetScoes extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Scoe[] */
    public $scoes;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;

    public function getSco()
    {
        return collect($this->scoes)->firstWhere('scormtype', '=', 'sco');
    }
}
