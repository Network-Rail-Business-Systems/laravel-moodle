<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Statuses extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['timecompleted'];

    /** @var int * */
    public $cmid;

    /** @var string * */
    public $modname;

    /** @var int * */
    public $instance;

    /** @var int * */
    public $state;

    /** @var int * */
    public $timecompleted;

    /** @var int * */
    public $tracking;

    /** @var mixed|null * */
    public $overrideby;

    /** @var bool * */
    public $valueused;
}
