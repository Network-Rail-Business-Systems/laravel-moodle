<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseContent extends FlexibleDataTransferObject
{
    /** @var integer */
    public $id;

    /** @var string */
    public $name;

    /** @var integer */
    public $visible;

    /** @var string */
    public $summary;

    /** @var integer */
    public $summaryformat;

    /** @var integer */
    public $section;

    /** @var integer */
    public $hiddenbynumsections;

    /** @var boolean */
    public $uservisible;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Module[] */
    public $modules;
}
