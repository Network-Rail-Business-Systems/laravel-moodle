<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Page extends DataTransferObject
{
    use HasDates;
    protected $dates = ['timemodified'];

    /** @var integer **/
    public $id;

    /** @var integer **/
    public $coursemodule;

    /** @var integer **/
    public $course;

    /** @var string **/
    public $name;

    /** @var string **/
    public $intro;

    /** @var integer **/
    public $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] **/
    public $introfiles;

    /** @var string **/
    public $content;

    /** @var integer **/
    public $contentformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] **/
    public $contentfiles;

    /** @var integer **/
    public $legacyfiles;

    /** @var mixed|null|integer **/
    public $legacyfileslast;

    /** @var integer **/
    public $display;

    /** @var string **/
    public $displayoptions;

    /** @var integer **/
    public $revision;

    /** @var integer **/
    public $timemodified;

    /** @var integer **/
    public $section;

    /** @var integer **/
    public $visible;

    /** @var integer **/
    public $groupmode;

    /** @var integer **/
    public $groupingid;
}
