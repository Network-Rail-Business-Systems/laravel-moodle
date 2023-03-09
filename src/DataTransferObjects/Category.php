<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Category extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['timemodified'];

    /** @var int * */
    public $id;

    /** @var string * */
    public $name;

    /** @var mixed|null|int * */
    public $idnumber;

    /** @var string * */
    public $description;

    /** @var int * */
    public $descriptionformat;

    /** @var int * */
    public $parent;

    /** @var int * */
    public $sortorder;

    /** @var int * */
    public $coursecount;

    /** @var int|null * */
    public $visible;

    /** @var int|null * */
    public $visibleold;

    /** @var int|null * */
    public $timemodified;

    /** @var int * */
    public $depth;

    /** @var string * */
    public $path;

    /** @var string|null * */
    public $theme;
}
