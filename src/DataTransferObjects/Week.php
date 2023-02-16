<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Week extends FlexibleDataTransferObject
{
    /** @var array */
    public $prepadding;

    /** @var array */
    public $postpadding;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Day[] */
    public $days;
}
