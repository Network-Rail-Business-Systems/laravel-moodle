<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CompletionStatus extends DataTransferObject
{
    /** @var boolean */
    public $completed;

    /** @var integer */
    public $aggregation;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Completion[] */
    public $completions;
}
