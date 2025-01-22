<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionStatus extends FlexibleDataTransferObject
{
    public bool $completed;

    public int $aggregation;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion[] */
    public array $completions;
}
