<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionData extends FlexibleDataTransferObject
{
    /** @var int */
    public $state;

    /** @var int */
    public $timecompleted;

    public $overrideby;

    /** @var bool */
    public $valueused;
}
