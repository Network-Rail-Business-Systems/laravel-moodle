<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseContent extends FlexibleDataTransferObject
{
    public int $id;

    public string $name;

    public int $visible;

    public string $summary;

    public int $summaryformat;

    public int $section;

    public int $hiddenbynumsections;

    public bool $uservisible;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Module[] */
    public array $modules;
}
