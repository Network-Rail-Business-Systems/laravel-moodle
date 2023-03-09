<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Scoe extends FlexibleDataTransferObject
{
    /** @var int */
    public $id;

    /** @var int */
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

    /** @var int */
    public $sortorder;

    /** @var array|null */
    public $extradata;
}
