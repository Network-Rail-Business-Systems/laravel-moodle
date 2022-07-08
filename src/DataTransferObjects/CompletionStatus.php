<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CompletionStatus extends DataTransferObject
{
    /** @var boolean */
    public $completed;

    /** @var integer */
    public $aggregation;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion[] */
    public $completions;
}
