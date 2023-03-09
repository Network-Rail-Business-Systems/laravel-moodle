<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Assignment extends FlexibleDataTransferObject
{
    /** @var int * */
    public $id;

    /** @var int * */
    public $cmid;

    /** @var int * */
    public $course;

    /** @var string * */
    public $name;

    /** @var int * */
    public $nosubmissions;

    /** @var int * */
    public $submissiondrafts;

    /** @var int * */
    public $sendnotifications;

    /** @var int * */
    public $sendlatenotifications;

    /** @var int * */
    public $sendstudentnotifications;

    /** @var int * */
    public $duedate;

    /** @var int * */
    public $allowsubmissionsfromdate;

    /** @var int * */
    public $grade;

    /** @var int * */
    public $timemodified;

    /** @var int * */
    public $completionsubmit;

    /** @var int * */
    public $cutoffdate;

    /** @var int * */
    public $gradingduedate;

    /** @var int * */
    public $teamsubmission;

    /** @var int * */
    public $requireallteammemberssubmit;

    /** @var int * */
    public $teamsubmissiongroupingid;

    /** @var int * */
    public $blindmarking;

    /** @var int * */
    public $hidegrader;

    /** @var int * */
    public $revealidentities;

    /** @var string * */
    public $attemptreopenmethod;

    /** @var int * */
    public $maxattempts;

    /** @var int * */
    public $markingworkflow;

    /** @var int * */
    public $markingallocation;

    /** @var int * */
    public $requiresubmissionstatement;

    /** @var int * */
    public $preventsubmissionnotingroup;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\AssignmentConfig[] * */
    public $configs;

    /** @var string * */
    public $intro;

    /** @var int * */
    public $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public $introfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public $introattachments;
}
