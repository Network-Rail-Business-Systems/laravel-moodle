<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Week extends FlexibleDataTransferObject
{
    public array $prepadding;

    public array $postpadding;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Day[] */
    public array $days;
}
