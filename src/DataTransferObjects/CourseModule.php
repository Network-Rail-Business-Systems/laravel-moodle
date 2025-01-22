<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseModule extends FlexibleDataTransferObject
{
    public int $id;

    public int $course;

    public int $module;

    public string $name;

    public string $modname;

    public int $instance;

    public int $section;

    public int $sectionnum;

    public int $groupmode;

    public int $groupingid;

    public int $completion;

    public string $idnumber;

    public int $added;

    public int $score;

    public int $indent;

    public int $visible;

    public int $visibleoncoursepage;

    public int $visibleold;

    public mixed $completiongradeitemnumber;

    public int $completionview;

    public int $completionexpected;

    public int $showdescription;

    public mixed $availability;

    public ?int $grade;

    public ?string $gradepass;

    public ?int $gradecat;

    public ?array $advancedgrading;
}
