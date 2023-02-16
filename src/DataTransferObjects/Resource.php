<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Resource extends FlexibleDataTransferObject
{
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

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] **/
    public $contentfiles;

    /** @var integer **/
    public $tobemigrated;

    /** @var integer **/
    public $legacyfiles;

    /** @var mixed **/
    public $legacyfileslast;

    /** @var integer **/
    public $display;

    /** @var string **/
    public $displayoptions;

    /** @var integer **/
    public $filterfiles;

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
