<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CoursePages extends FlexibleDataTransferObject
{
    /** @var Page[] */
    public array $pages;

    /** @var Warning[] */
    public array $warnings;
}
