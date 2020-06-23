<?php


namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;


use Spatie\DataTransferObject\DataTransferObject;

class CourseModule extends DataTransferObject
{

    /** @var integer **/
    public $id;

    /** @var integer **/
    public $course;

    /** @var integer **/
    public $module;

    /** @var string **/
    public $name;

    /** @var string **/
    public $modname;

    /** @var integer **/
    public $instance;

    /** @var integer **/
    public $section;

    /** @var integer **/
    public $sectionnum;

    /** @var integer **/
    public $groupmode;

    /** @var integer **/
    public $groupingid;

    /** @var integer **/
    public $completion;

    /** @var string **/
    public $idnumber;

    /** @var integer **/
    public $added;

    /** @var integer **/
    public $score;

    /** @var integer **/
    public $indent;

    /** @var integer **/
    public $visible;

    /** @var integer **/
    public $visibleoncoursepage;

    /** @var integer **/
    public $visibleold;

    /** @var mixed|null|integer **/
    public $completiongradeitemnumber;

    /** @var integer **/
    public $completionview;

    /** @var integer **/
    public $completionexpected;

    /** @var integer **/
    public $showdescription;

    /** @var mixed|null|integer **/
    public $availability;

    /** @var null|integer */
    public $grade;

    /** @var null|string */
    public $gradepass;

    /** @var null|integer */
    public $gradecat;

    /** @var null|array */
    public $advancedgrading;
}
