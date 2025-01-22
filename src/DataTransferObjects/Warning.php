<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Warning extends FlexibleDataTransferObject
{
    public string $item;

    public int $itemid;

    public string $warningcode;

    public string $message;
}
