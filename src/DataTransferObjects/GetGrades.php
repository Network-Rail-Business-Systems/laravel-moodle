<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetGrades extends FlexibleDataTransferObject
{
    /** @var null|Grade[] */
    public ?array $grades;

    /** @var null|Warning[] */
    public ?array $warnings;
}
