<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetGrades extends DataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Grade[] */
    public $grades;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
