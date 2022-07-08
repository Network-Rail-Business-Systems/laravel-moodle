<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaraMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Category extends DataTransferObject
{
    use HasDates;
    protected $dates = ['timemodified'];

    /** @var integer **/
    public $id;

    /** @var string **/
    public $name;

    /** @var mixed|null|integer **/
    public $idnumber;

    /** @var string **/
    public $description;

    /** @var integer **/
    public $descriptionformat;

    /** @var integer **/
    public $parent;

    /** @var integer **/
    public $sortorder;

    /** @var integer **/
    public $coursecount;

    /** @var integer|null **/
    public $visible;

    /** @var integer|null **/
    public $visibleold;

    /** @var integer|null **/
    public $timemodified;

    /** @var integer **/
    public $depth;

    /** @var string **/
    public $path;

    /** @var string|null **/
    public $theme;
}
