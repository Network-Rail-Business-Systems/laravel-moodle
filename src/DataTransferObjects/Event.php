<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Event extends FlexibleDataTransferObject
{
    /** @var int * */
    public $id;

    /** @var string * */
    public $name;

    /** @var string * */
    public $description;

    /** @var int * */
    public $descriptionformat;

    /** @var string * */
    public $location;

    /** @var null|int * */
    public $categoryid;

    /** @var null|int * */
    public $groupid;

    /** @var int * */
    public $userid;

    /** @var null|int * */
    public $repeatid;

    /** @var null|int * */
    public $eventcount;

    /** @var null|string * */
    public $component;

    /** @var string * */
    public $modulename;

    /** @var int * */
    public $instance;

    /** @var string * */
    public $eventtype;

    /** @var int * */
    public $timestart;

    /** @var int * */
    public $timeduration;

    /** @var int * */
    public $timesort;

    /** @var int * */
    public $visible;

    /** @var int * */
    public $timemodified;

    /** @var array * */
    public $icon;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\EventCourse * */
    public $course;

    /** @var array * */
    public $subscription;

    /** @var bool * */
    public $canedit;

    /** @var bool * */
    public $candelete;

    /** @var string * */
    public $deleteurl;

    /** @var string * */
    public $editurl;

    /** @var string * */
    public $viewurl;

    /** @var string * */
    public $formattedtime;

    /** @var bool * */
    public $isactionevent;

    /** @var null|array */
    public $action;

    /** @var bool * */
    public $iscourseevent;

    /** @var bool * */
    public $iscategoryevent;

    /** @var null|string * */
    public $groupname;

    /** @var string * */
    public $normalisedeventtype;

    /** @var string * */
    public $normalisedeventtypetext;

    /** @var string * */
    public $url;

    /** @var bool * */
    public $islastday;

    /** @var string * */
    public $popupname;

    /** @var null|int */
    public $mindaytimestamp;

    /** @var null|string */
    public $mindayerror;

    /** @var null|int */
    public $maxdaytimestamp;

    /** @var null|string */
    public $maxdayerror;

    /** @var bool * */
    public $draggable;
}
