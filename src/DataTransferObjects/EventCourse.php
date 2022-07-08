<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class EventCourse extends DataTransferObject
{
    /** @var integer **/
    public $id;

    /** @var string **/
    public $fullname;

    /** @var string **/
    public $shortname;

    /** @var null|string **/
    public $idnumber;

    /** @var string **/
    public $summary;

    /** @var integer **/
    public $summaryformat;

    /** @var integer **/
    public $startdate;

    /** @var integer **/
    public $enddate;

    /** @var boolean **/
    public $visible;

    /** @var string **/
    public $fullnamedisplay;

    /** @var string **/
    public $viewurl;

    /** @var string **/
    public $courseimage;

    /** @var null|integer **/
    public $progress;

    /** @var boolean **/
    public $hasprogress;

    /** @var boolean **/
    public $isfavourite;

    /** @var boolean **/
    public $hidden;

    /** @var boolean **/
    public $showshortname;

    /** @var string **/
    public $coursecategory;
}
