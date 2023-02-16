<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionStatus extends FlexibleDataTransferObject
{
    /** @var boolean */
    public $completed;

    /** @var integer */
    public $aggregation;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion[] */
    public $completions;
}
