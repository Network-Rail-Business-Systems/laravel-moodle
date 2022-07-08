<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Week extends DataTransferObject
{
    /** @var array */
    public $prepadding;

    /** @var array */
    public $postpadding;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Day[] */
    public $days;
}
