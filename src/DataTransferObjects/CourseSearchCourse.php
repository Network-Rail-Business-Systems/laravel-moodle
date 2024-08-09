<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Grade;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCourseImages;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCustomFields;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseSearchCourse extends FlexibleDataTransferObject
{
    use HasCourseImages;
    use HasCustomFields;

    /** @var int */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $displayname;

    /** @var string */
    public $shortname;

    /** @var int */
    public $categoryid;

    /** @var string */
    public $categoryname;

    /** @var string */
    public $summary;

    /** @var int */
    public $sortorder;

    /** @var int */
    public $summaryformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public $summaryfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public $overviewfiles;

    /** @var array */
    public $contacts;

    /** @var array */
    public $enrollmentmethods;

    /** @var mixed|null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CustomField[] */
    public $customfields;

    public ?bool $completed = null;

    public ?int $percentage = null;

    public ?Grade $grade = null;
}
