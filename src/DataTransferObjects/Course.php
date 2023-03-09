<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCourseImages;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCustomFields;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasEnrollements;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Course extends FlexibleDataTransferObject
{
    use HasDates;
    use HasCourseImages;
    use HasCustomFields;
    use HasEnrollements;

    protected $dates = ['startdate', 'enddate', 'timecreated', 'timemodified'];

    /** @var int */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;

    /** @var string */
    public $displayname;

    /** @var int */
    public $categoryid;

    /** @var string */
    public $categoryname;

    /** @var int */
    public $sortorder;

    /** @var string */
    public $summary;

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

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CustomField[] */
    public $customfields;

    /** @var string|null */
    public $idnumber;

    /** @var string|null */
    public $format;

    /** @var int|null */
    public $showgrades;

    /** @var int|null */
    public $newsitems;

    /** @var int|null */
    public $startdate;

    /** @var int|null */
    public $enddate;

    /** @var int|null */
    public $maxbytes;

    /** @var int|null */
    public $showreports;

    /** @var int|null */
    public $visible;

    /** @var int|null */
    public $groupmode;

    /** @var int|null */
    public $groupmodeforce;

    /** @var int|null */
    public $defaultgroupingid;

    /** @var int|null */
    public $enablecompletion;

    /** @var int|null */
    public $completionnotify;

    /** @var string|null */
    public $lang;

    /** @var string|null */
    public $theme;

    /** @var int|null */
    public $marker;

    /** @var int|null */
    public $legacyfiles;

    /** @var string|null */
    public $calendartype;

    /** @var int|null */
    public $timecreated;

    /** @var int|null */
    public $timemodified;

    /** @var int|null */
    public $requested;

    /** @var int|null */
    public $cacherev;

    /** @var array|null */
    public $filters;

    /** @var mixed|null|array */
    public $courseformatoptions;

    public function fullname()
    {
        return html_entity_decode($this->fullname);
    }
}
