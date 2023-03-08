<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Scorm extends FlexibleDataTransferObject
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

    /** @var int * */
    public $packagesize;

    /** @var string */
    public $packageurl;

    /** @var string * */
    public $version;

    /** @var int * */
    public $maxgrade;

    /** @var int * */
    public $grademethod;

    /** @var int * */
    public $whatgrade;

    /** @var int * */
    public $maxattempt;

    /** @var bool * */
    public $forcecompleted;

    /** @var int * */
    public $forcenewattempt;

    /** @var bool * */
    public $lastattemptlock;

    /** @var int * */
    public $displayattemptstatus;

    /** @var bool * */
    public $displaycoursestructure;

    /** @var string * */
    public $sha1hash;

    /** @var string * */
    public $md5hash;

    /** @var int * */
    public $revision;

    /** @var int * */
    public $launch;

    /** @var int * */
    public $skipview;

    /** @var bool * */
    public $hidebrowse;

    /** @var int * */
    public $hidetoc;

    /** @var int * */
    public $nav;

    /** @var int * */
    public $navpositionleft;

    /** @var int * */
    public $navpositiontop;

    /** @var bool * */
    public $auto;

    /** @var int * */
    public $popup;

    /** @var int * */
    public $width;

    /** @var int * */
    public $height;

    /** @var int * */
    public $timeopen;

    /** @var int * */
    public $timeclose;

    public bool|null $displayactivityname;

    /** @var string * */
    public $scormtype;

    /** @var string * */
    public $reference;

    /** @var bool * */
    public $protectpackagedownloads;

    /** @var int|null * */
    public $updatefreq;

    /** @var string|null * */
    public $options;

    /** @var mixed|null|bool * */
    public $completionstatusrequired;

    /** @var mixed|null|bool * */
    public $completionscorerequired;

    /** @var int|null * */
    public $completionstatusallscos;

    /** @var bool|null * */
    public $autocommit;

    /** @var int|null * */
    public $timemodified;

    /** @var int|null * */
    public $section;

    /** @var bool|null * */
    public $visible;

    /** @var int|null * */
    public $groupmode;

    /** @var int|null * */
    public $groupingid;
}
