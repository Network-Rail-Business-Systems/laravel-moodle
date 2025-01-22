<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionStatus extends FlexibleDataTransferObject
{
    public bool $completed;

    public int $aggregation;

    public array $completions;
}
