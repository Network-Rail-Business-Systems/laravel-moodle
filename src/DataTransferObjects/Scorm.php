<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use NRBusinessSystems\LaraMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Scorm extends DataTransferObject
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

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\FileObject[] **/
    public $introfiles;

    /** @var integer **/
    public $packagesize;

    /** @var string */
    public $packageurl;

    /** @var string **/
    public $version;

    /** @var integer **/
    public $maxgrade;

    /** @var integer **/
    public $grademethod;

    /** @var integer **/
    public $whatgrade;

    /** @var integer **/
    public $maxattempt;

    /** @var boolean **/
    public $forcecompleted;

    /** @var integer **/
    public $forcenewattempt;

    /** @var boolean **/
    public $lastattemptlock;

    /** @var integer **/
    public $displayattemptstatus;

    /** @var boolean **/
    public $displaycoursestructure;

    /** @var string **/
    public $sha1hash;

    /** @var string **/
    public $md5hash;

    /** @var integer **/
    public $revision;

    /** @var integer **/
    public $launch;

    /** @var integer **/
    public $skipview;

    /** @var boolean **/
    public $hidebrowse;

    /** @var integer **/
    public $hidetoc;

    /** @var integer **/
    public $nav;

    /** @var integer **/
    public $navpositionleft;

    /** @var integer **/
    public $navpositiontop;

    /** @var boolean **/
    public $auto;

    /** @var integer **/
    public $popup;

    /** @var integer **/
    public $width;

    /** @var integer **/
    public $height;

    /** @var integer **/
    public $timeopen;

    /** @var integer **/
    public $timeclose;

    /** @var boolean **/
    public $displayactivityname;

    /** @var string **/
    public $scormtype;

    /** @var string **/
    public $reference;

    /** @var boolean **/
    public $protectpackagedownloads;

    /** @var integer **/
    public $updatefreq;

    /** @var string **/
    public $options;

    /** @var mixed|null|boolean **/
    public $completionstatusrequired;

    /** @var mixed|null|boolean **/
    public $completionscorerequired;

    /** @var integer **/
    public $completionstatusallscos;

    /** @var boolean **/
    public $autocommit;

    /** @var integer **/
    public $timemodified;

    /** @var integer **/
    public $section;

    /** @var boolean **/
    public $visible;

    /** @var integer **/
    public $groupmode;

    /** @var integer **/
    public $groupingid;
}
