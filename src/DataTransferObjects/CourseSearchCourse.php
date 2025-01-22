<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCourseImages;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCustomFields;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseSearchCourse extends FlexibleDataTransferObject
{
    use HasCourseImages;
    use HasCustomFields;

    public int $id;

    public string $fullname;

    public string $displayname;

    public string $shortname;

    public int $categoryid;

    public string $categoryname;

    public string $summary;

    public int $sortorder;

    public int $summaryformat;

    public array $summaryfiles;

    public array $overviewfiles;

    public array $contacts;

    public array $enrollmentmethods;

    public mixed $customfields;

    public ?bool $completed = null;

    public ?int $percentage = null;

    public ?Grade $grade = null;
}
