<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseContent extends FlexibleDataTransferObject
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var int */
    public $visible;

    /** @var string */
    public $summary;

    /** @var int */
    public $summaryformat;

    /** @var int */
    public $section;

    /** @var int */
    public $hiddenbynumsections;

    /** @var bool */
    public $uservisible;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Module[] */
    public $modules;
}
