<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Assignment extends DataTransferObject
{
    /** @var integer **/
    public $id;

    /** @var integer **/
    public $cmid;

    /** @var integer **/
    public $course;

    /** @var string **/
    public $name;

    /** @var integer **/
    public $nosubmissions;

    /** @var integer **/
    public $submissiondrafts;

    /** @var integer **/
    public $sendnotifications;

    /** @var integer **/
    public $sendlatenotifications;

    /** @var integer **/
    public $sendstudentnotifications;

    /** @var integer **/
    public $duedate;

    /** @var integer **/
    public $allowsubmissionsfromdate;

    /** @var integer **/
    public $grade;

    /** @var integer **/
    public $timemodified;

    /** @var integer **/
    public $completionsubmit;

    /** @var integer **/
    public $cutoffdate;

    /** @var integer **/
    public $gradingduedate;

    /** @var integer **/
    public $teamsubmission;

    /** @var integer **/
    public $requireallteammemberssubmit;

    /** @var integer **/
    public $teamsubmissiongroupingid;

    /** @var integer **/
    public $blindmarking;

    /** @var integer **/
    public $hidegrader;

    /** @var integer **/
    public $revealidentities;

    /** @var string **/
    public $attemptreopenmethod;

    /** @var integer **/
    public $maxattempts;

    /** @var integer **/
    public $markingworkflow;

    /** @var integer **/
    public $markingallocation;

    /** @var integer **/
    public $requiresubmissionstatement;

    /** @var integer **/
    public $preventsubmissionnotingroup;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\AssignmentConfig[] **/
    public $configs;

    /** @var string **/
    public $intro;

    /** @var integer **/
    public $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] **/
    public $introfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] **/
    public $introattachments;
}
