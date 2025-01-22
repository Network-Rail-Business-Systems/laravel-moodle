<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Scorm extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timemodified'];

    public int $id;

    public int $coursemodule;

    public int $course;

    public string $name;

    public string $intro;

    public int $introformat;

    public array $introfiles;

    public int $packagesize;

    public string $packageurl;

    public string $version;

    public int $maxgrade;

    public int $grademethod;

    public int $whatgrade;

    public int $maxattempt;

    public bool $forcecompleted;

    public int $forcenewattempt;

    public bool $lastattemptlock;

    public int $displayattemptstatus;

    public bool $displaycoursestructure;

    public string $sha1hash;

    public string $md5hash;

    public int $revision;

    public int $launch;

    public int $skipview;

    public bool $hidebrowse;

    public int $hidetoc;

    public int $nav;

    public int $navpositionleft;

    public int $navpositiontop;

    public bool $auto;

    public int $popup;

    public int $width;

    public int $height;

    public int $timeopen;

    public int $timeclose;

    public ?bool $displayactivityname;

    public string $scormtype;

    public string $reference;

    public bool $protectpackagedownloads;

    public ?int $updatefreq;

    public ?string $options;

    public mixed $completionstatusrequired;

    public mixed $completionscorerequired;

    public ?int $completionstatusallscos;

    public ?bool $autocommit;

    public ?int $timemodified;

    public ?int $section;

    public ?bool $visible;

    public ?int $groupmode;

    public ?int $groupingid;
}
