<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use NRBusinessSystems\LaraMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Course extends DataTransferObject
{
    use HasDates;

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

    /** @var string */
    public $idnumber;

    /** @var string */
    public $format;

    /** @var integer */
    public $showgrades;

    /** @var integer */
    public $newsitems;

    /** @var integer */
    public $startdate;

    /** @var integer */
    public $enddate;

    /** @var integer */
    public $maxbytes;

    /** @var integer */
    public $showreports;

    /** @var integer */
    public $visible;

    /** @var integer */
    public $groupmode;

    /** @var integer */
    public $groupmodeforce;

    /** @var integer */
    public $defaultgroupingid;

    /** @var integer */
    public $enablecompletion;

    /** @var integer */
    public $completionnotify;

    /** @var string */
    public $lang;

    /** @var string */
    public $theme;

    /** @var integer */
    public $marker;

    /** @var integer */
    public $legacyfiles;

    /** @var string */
    public $calendartype;

    /** @var integer */
    public $timecreated;

    /** @var integer */
    public $timemodified;

    /** @var integer */
    public $requested;

    /** @var integer */
    public $cacherev;

    /** @var array */
    public $filters;

    /** @var mixed|null|array */
    public $courseformatoptions;
}
