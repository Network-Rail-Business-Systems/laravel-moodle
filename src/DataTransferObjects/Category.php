<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Category extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timemodified'];

    public int $id;

    public string $name;

    public ?string $idnumber;

    public string $description;

    public int $descriptionformat;

    public int $parent;

    public int $sortorder;

    public int $coursecount;

    public ?int $visible;

    public ?int $visibleold;

    public ?int $timemodified;

    public int $depth;

    public string $path;

    public ?string $theme;
}
