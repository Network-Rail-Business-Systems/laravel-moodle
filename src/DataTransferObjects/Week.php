<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Week extends DataTransferObject
{
    /** @var array */
    public $prepadding;

    /** @var array */
    public $postpadding;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Day[] */
    public $days;
}
