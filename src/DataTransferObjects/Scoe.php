<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Scoe extends FlexibleDataTransferObject
{
    public int $id;

    public int $scorm;

    public string $manifest;

    public string $organization;

    public string $parent;

    public string $identifier;

    public string $launch;

    public string $scormtype;

    public string $title;

    public int $sortorder;

    public ?array $extradata;
}
