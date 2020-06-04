<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Statuses extends DataTransferObject
{
    /** @var integer **/
    public $cmid;

    /** @var string **/
    public $modname;

    /** @var integer **/
    public $instance;

    /** @var integer **/
    public $state;

    /** @var integer **/
    public $timecompleted;

    /** @var integer **/
    public $tracking;

    /** @var mixed|null **/
    public $overrideby;

    /** @var boolean **/
    public $valueused;
}
