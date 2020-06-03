<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Course extends DataTransferObject
{
    /** @var integer */
    public $id;

    /** @var string */
    public $shortname;

    /** @var string */
    public $fullname;

    /** @var integer */
    public $categoryid;

    /** @var integer */
    public $categorysortorder;

    /** @var string */
    public $displayname;

    /** @var string */
    public $idnumber;

    /** @var string */
    public $summary;

    /** @var integer */
    public $summaryformat;

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
    public $numsections;

    /** @var integer */
    public $maxbytes;

    /** @var integer */
    public $showreports;

    /** @var integer */
    public $visible;

    /** @var integer */
    public $hiddensections;

    /** @var integer */
    public $groupmode;

    /** @var integer */
    public $groupmodeforce;

    /** @var integer */
    public $defaultgroupingid;

    /** @var integer */
    public $timecreated;

    /** @var integer */
    public $timemodified;

    /** @var integer */
    public $enablecompletion;

    /** @var integer */
    public $completionnotify;

    /** @var string */
    public $lang;

    /** @var string */
    public $forcetheme;

    /** @var array */
    public $courseformatoptions;
}
