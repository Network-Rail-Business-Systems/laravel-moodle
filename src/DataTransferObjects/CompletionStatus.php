<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CompletionStatus extends DataTransferObject
{
    /** @var boolean */
    public $completed;

    /** @var integer */
    public $aggregation;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Completion[] */
    public $completions;
}
