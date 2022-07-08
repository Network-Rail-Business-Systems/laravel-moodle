<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class Scoe extends DataTransferObject
{
    /** @var integer */
    public $id;

    /** @var integer */
    public $scorm;

    /** @var string` */
    public $manifest;

    /** @var string */
    public $organization;

    /** @var string */
    public $parent;

    /** @var string */
    public $identifier;

    /** @var string */
    public $launch;

    /** @var string */
    public $scormtype;

    /** @var string */
    public $title;

    /** @var integer */
    public $sortorder;

    /** @var array|null */
    public $extradata;
}
