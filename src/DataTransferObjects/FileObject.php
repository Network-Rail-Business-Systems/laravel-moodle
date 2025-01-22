<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class FileObject extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timemodified'];

    public string $filename;

    public string $filepath;

    public int $filesize;

    public string $fileurl;

    public int $timemodified;

    public string $mimetype;

    public ?bool $isexternalfile;
}
