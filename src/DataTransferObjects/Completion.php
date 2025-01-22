<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Completion extends FlexibleDataTransferObject
{
    public int $type;

    public string $title;

    public string $status;

    public bool $complete;

    public mixed $timecompleted;

    public array $details;
}
