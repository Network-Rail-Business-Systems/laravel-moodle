<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseModule extends FlexibleDataTransferObject
{
    /** @var int * */
    public $id;

    /** @var int * */
    public $course;

    /** @var int * */
    public $module;

    /** @var string * */
    public $name;

    /** @var string * */
    public $modname;

    /** @var int * */
    public $instance;

    /** @var int * */
    public $section;

    /** @var int * */
    public $sectionnum;

    /** @var int * */
    public $groupmode;

    /** @var int * */
    public $groupingid;

    /** @var int * */
    public $completion;

    /** @var string * */
    public $idnumber;

    /** @var int * */
    public $added;

    /** @var int * */
    public $score;

    /** @var int * */
    public $indent;

    /** @var int * */
    public $visible;

    /** @var int * */
    public $visibleoncoursepage;

    /** @var int * */
    public $visibleold;

    /** @var mixed|null|int * */
    public $completiongradeitemnumber;

    /** @var int * */
    public $completionview;

    /** @var int * */
    public $completionexpected;

    /** @var int * */
    public $showdescription;

    /** @var mixed|null|int * */
    public $availability;

    /** @var null|int */
    public $grade;

    /** @var null|string */
    public $gradepass;

    /** @var null|int */
    public $gradecat;

    /** @var null|array */
    public $advancedgrading;
}
