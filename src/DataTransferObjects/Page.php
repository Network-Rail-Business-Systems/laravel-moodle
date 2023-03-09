<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Page extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['timemodified'];

    /** @var int * */
    public $id;

    /** @var int * */
    public $coursemodule;

    /** @var int * */
    public $course;

    /** @var string * */
    public $name;

    /** @var string * */
    public $intro;

    /** @var int * */
    public $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public $introfiles;

    /** @var string * */
    public $content;

    /** @var int * */
    public $contentformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public $contentfiles;

    /** @var int * */
    public $legacyfiles;

    /** @var mixed|null|int * */
    public $legacyfileslast;

    /** @var int * */
    public $display;

    /** @var string * */
    public $displayoptions;

    /** @var int * */
    public $revision;

    /** @var int * */
    public $timemodified;

    /** @var int * */
    public $section;

    /** @var int * */
    public $visible;

    /** @var int * */
    public $groupmode;

    /** @var int * */
    public $groupingid;
}
