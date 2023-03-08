<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class FileObject extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['timemodified'];

    /** @var string */
    public $filename;

    /** @var string */
    public $filepath;

    /** @var int */
    public $filesize;

    /** @var string */
    public $fileurl;

    /** @var int */
    public $timemodified;

    /** @var mixed|null|string */
    public $mimetype;

    /** @var mixed|null|bool */
    public $isexternalfile;
}
