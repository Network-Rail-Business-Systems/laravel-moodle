<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GetGrades extends DataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Grade[] */
    public $grades;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
