<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Assignment extends FlexibleDataTransferObject
{
    public int $id;

    public int $cmid;

    public int $course;

    public string $name;

    public int $nosubmissions;

    public int $submissiondrafts;

    public int $sendnotifications;

    public int $sendlatenotifications;

    public int $sendstudentnotifications;

    public int $duedate;

    public int $allowsubmissionsfromdate;

    public int $grade;

    public int $timemodified;

    public int $completionsubmit;

    public int $cutoffdate;

    public int $gradingduedate;

    public int $teamsubmission;

    public int $requireallteammemberssubmit;

    public int $teamsubmissiongroupingid;

    public int $blindmarking;

    public int $hidegrader;

    public int $revealidentities;

    public string $attemptreopenmethod;

    public int $maxattempts;

    public int $markingworkflow;

    public int $markingallocation;

    public int $requiresubmissionstatement;

    public int $preventsubmissionnotingroup;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\AssignmentConfig[] * */
    public array $configs;

    public string $intro;

    public int $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public array $introfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] * */
    public array $introattachments;
}
