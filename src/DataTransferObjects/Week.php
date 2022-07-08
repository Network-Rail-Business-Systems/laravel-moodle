<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Week extends DataTransferObject
{
    /** @var array */
    public $prepadding;

    /** @var array */
    public $postpadding;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Day[] */
    public $days;
}
