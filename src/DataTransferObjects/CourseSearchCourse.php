<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CourseSearchCourse extends DataTransferObject
{
    /** @var integer */
    public $id;

    /** @var string */
    public $fullname;

    /** @var string */
    public $displayname;

    /** @var string */
    public $shortname;

    /** @var integer */
    public $categoryid;

    /** @var string */
    public $categoryname;

    /** @var string */
    public $summary;

    /** @var integer */
    public $sortorder;

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
}
