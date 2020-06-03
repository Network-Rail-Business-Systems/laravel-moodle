<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FileObject extends DataTransferObject
{
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
