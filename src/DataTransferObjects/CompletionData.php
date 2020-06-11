<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CompletionData extends DataTransferObject
{
    /** @var integer */
    public $state;

    /** @var integer */
    public $timecompleted;

    public $overrideby;

    /** @var boolean */
    public $valueused;
}
