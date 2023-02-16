<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Statuses extends FlexibleDataTransferObject
{
    use HasDates;
    protected $dates = ['timecompleted'];

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
