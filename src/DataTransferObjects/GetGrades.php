<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetGrades extends DataTransferObject
{
    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Grade[] */
    public $grades;

    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
