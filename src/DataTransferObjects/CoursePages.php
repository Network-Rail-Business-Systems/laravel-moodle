<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CoursePages extends DataTransferObject
{
    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Page[] */
    public $pages;

    /** @var array */
    public $warnings;
}
