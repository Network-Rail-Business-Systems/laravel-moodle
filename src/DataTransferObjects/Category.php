<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Category extends DataTransferObject
{
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

    /** @var integer **/
    public $visible;

    /** @var integer **/
    public $visibleold;

    /** @var integer **/
    public $timemodified;

    /** @var integer **/
    public $depth;

    /** @var string **/
    public $path;

    /** @var string **/
    public $theme;
}
