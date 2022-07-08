<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class FileObject extends DataTransferObject
{
    use HasDates;
    protected $dates = ['timemodified'];

    /** @var string */
    public $filename;

    /** @var string */
    public $filepath;

    /** @var integer */
    public $filesize;

    /** @var string */
    public $fileurl;

    /** @var integer */
    public $timemodified;

    /** @var mixed|null|string */
    public $mimetype;

    /** @var mixed|null|boolean */
    public $isexternalfile;
}
