<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Completion extends DataTransferObject
{
    /** @var integer */
    public $type;

    /** @var string */
    public $title;

    /** @var string */
    public $status;

    /** @var boolean */
    public $complete;

    /** @var mixed|null|integer */
    public $timecompleted;

    /** @var array */
    public $details;
}
