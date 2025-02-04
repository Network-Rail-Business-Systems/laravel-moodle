<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasActivity;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Module extends FlexibleDataTransferObject
{
    use HasActivity;
    use HasDates;

    protected array $dates = ['added'];

    public int $id;

    public string $url;

    public string $name;

    public int $instance;

    public ?string $description;

    public int $visible;

    public bool $uservisible;

    public int $visibleoncoursepage;

    public string $modicon;

    public string $modname;

    public string $modplural;

    public ?string $availability;

    public int $indent;

    public string $onclick;

    public ?string $afterlink;

    public string $customdata;

    public bool $noviewlink;

    public int $completion;

    public ?CompletionData $completiondata;

    public ?array $contents;

    public ?array $contentsinfo;
}
