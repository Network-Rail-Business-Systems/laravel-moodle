<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Page extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timemodified'];

    public int $id;

    public int $coursemodule;

    public int $course;

    public string $name;

    public string $intro;

    public int $introformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $introfiles;

    public string $content;

    public int $contentformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $contentfiles;

    public int $legacyfiles;

    public mixed $legacyfileslast;

    public int $display;

    public string $displayoptions;

    public int $revision;

    public int $timemodified;

    public int $section;

    public int $visible;

    public int $groupmode;

    public int $groupingid;
}
