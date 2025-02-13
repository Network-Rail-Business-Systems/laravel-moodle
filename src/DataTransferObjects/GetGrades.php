<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetGrades extends FlexibleDataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Grade[] */
    public ?array $grades;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public ?array $warnings;
}
