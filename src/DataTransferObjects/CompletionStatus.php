<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionStatus extends FlexibleDataTransferObject
{
    /** @var bool */
    public $completed;

    /** @var int */
    public $aggregation;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion[] */
    public $completions;
}
