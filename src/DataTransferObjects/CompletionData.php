<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CompletionData extends FlexibleDataTransferObject
{
    public int $state;

    public int $timecompleted;

    public ?int $overrideby;

    public bool $valueused;
}
