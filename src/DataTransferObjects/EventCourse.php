<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EventCourse extends FlexibleDataTransferObject
{
    /** @var int * */
    public $id;

    /** @var string * */
    public $fullname;

    /** @var string * */
    public $shortname;

    /** @var null|string * */
    public $idnumber;

    /** @var string * */
    public $summary;

    /** @var int * */
    public $summaryformat;

    /** @var int * */
    public $startdate;

    /** @var int * */
    public $enddate;

    /** @var bool * */
    public $visible;

    /** @var string * */
    public $fullnamedisplay;

    /** @var string * */
    public $viewurl;

    /** @var string * */
    public $courseimage;

    /** @var null|int * */
    public $progress;

    /** @var bool * */
    public $hasprogress;

    /** @var bool * */
    public $isfavourite;

    /** @var bool * */
    public $hidden;

    /** @var bool * */
    public $showshortname;

    /** @var string * */
    public $coursecategory;
}
