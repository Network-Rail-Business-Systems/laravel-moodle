<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use NRBusinessSystems\LaraMoodle\Traits\HasCourseImages;
use NRBusinessSystems\LaraMoodle\Traits\HasCustomFields;
use NRBusinessSystems\LaraMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Course extends DataTransferObject
{
    use HasDates;
    use HasCourseImages;
    use HasCustomFields;

    protected $dates = ['startdate', 'enddate', 'timecreated', 'timemodified'];

    /** @var integer */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $shortname;

    /** @var string */
    public $displayname;

    /** @var integer */
    public $categoryid;

    /** @var string */
    public $categoryname;

    /** @var integer */
    public $sortorder;

    /** @var string */
    public $summary;

    /** @var integer */
    public $summaryformat;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\FileObject[] */
    public $summaryfiles;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\FileObject[] */
    public $overviewfiles;

    /** @var array */
    public $contacts;

    /** @var array */
    public $enrollmentmethods;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\CustomField[] */
    public $customfields;

    /** @var string|null */
    public $idnumber;

    /** @var string|null */
    public $format;

    /** @var integer|null */
    public $showgrades;

    /** @var integer|null */
    public $newsitems;

    /** @var integer|null */
    public $startdate;

    /** @var integer|null */
    public $enddate;

    /** @var integer|null */
    public $maxbytes;

    /** @var integer|null */
    public $showreports;

    /** @var integer|null */
    public $visible;

    /** @var integer|null */
    public $groupmode;

    /** @var integer|null */
    public $groupmodeforce;

    /** @var integer|null */
    public $defaultgroupingid;

    /** @var integer|null */
    public $enablecompletion;

    /** @var integer|null */
    public $completionnotify;

    /** @var string|null */
    public $lang;

    /** @var string|null */
    public $theme;

    /** @var integer|null */
    public $marker;

    /** @var integer|null */
    public $legacyfiles;

    /** @var string|null */
    public $calendartype;

    /** @var integer|null */
    public $timecreated;

    /** @var integer|null */
    public $timemodified;

    /** @var integer|null */
    public $requested;

    /** @var integer|null */
    public $cacherev;

    /** @var array|null */
    public $filters;

    /** @var mixed|null|array */
    public $courseformatoptions;
}
