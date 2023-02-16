<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionData extends FlexibleDataTransferObject
{
    /** @var integer */
    public $state;

    /** @var integer */
    public $timecompleted;

    public $overrideby;

    /** @var boolean */
    public $valueused;
}
