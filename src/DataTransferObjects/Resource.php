<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Resource extends FlexibleDataTransferObject
{
    public int $id;

    public int $coursemodule;

    public int $course;

    public string $name;

    public string $intro;

    public int $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $introfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $contentfiles;

    public int $tobemigrated;

    public int $legacyfiles;

    public mixed $legacyfileslast;

    public int $display;

    public string $displayoptions;

    public int $filterfiles;

    public int $revision;

    public int $timemodified;

    public int $section;

    public int $visible;

    public int $groupmode;

    public int $groupingid;
}
