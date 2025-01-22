<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class DayNames extends FlexibleDataTransferObject
{
    public int $dayno;

    public string $shortname;

    public string $fullname;
}
