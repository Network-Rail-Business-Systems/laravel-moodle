<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Event extends DataTransferObject
{
    /** @var integer **/
    public $id;

    /** @var string **/
    public $name;

    /** @var string **/
    public $description;

    /** @var integer **/
    public $descriptionformat;

    /** @var string **/
    public $location;

    /** @var null|integer **/
    public $categoryid;

    /** @var null|integer **/
    public $groupid;

    /** @var integer **/
    public $userid;

    /** @var null|integer **/
    public $repeatid;

    /** @var null|integer **/
    public $eventcount;

    /** @var null|string **/
    public $component;

    /** @var string **/
    public $modulename;

    /** @var integer **/
    public $instance;

    /** @var string **/
    public $eventtype;

    /** @var integer **/
    public $timestart;

    /** @var integer **/
    public $timeduration;

    /** @var integer **/
    public $timesort;

    /** @var integer **/
    public $visible;

    /** @var integer **/
    public $timemodified;

    /** @var array **/
    public $icon;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\EventCourse **/
    public $course;

    /** @var array **/
    public $subscription;

    /** @var boolean **/
    public $canedit;

    /** @var boolean **/
    public $candelete;

    /** @var string **/
    public $deleteurl;

    /** @var string **/
    public $editurl;

    /** @var string **/
    public $viewurl;

    /** @var string **/
    public $formattedtime;

    /** @var boolean **/
    public $isactionevent;

    /** @var null|array */
    public $action;

    /** @var boolean **/
    public $iscourseevent;

    /** @var boolean **/
    public $iscategoryevent;

    /** @var null|string **/
    public $groupname;

    /** @var string **/
    public $normalisedeventtype;

    /** @var string **/
    public $normalisedeventtypetext;

    /** @var string **/
    public $url;

    /** @var boolean **/
    public $islastday;

    /** @var string **/
    public $popupname;

    /** @var null|integer */
    public $mindaytimestamp;

    /** @var null|string */
    public $mindayerror;

    /** @var null|integer */
    public $maxdaytimestamp;

    /** @var null|string */
    public $maxdayerror;

    /** @var boolean **/
    public $draggable;
}
