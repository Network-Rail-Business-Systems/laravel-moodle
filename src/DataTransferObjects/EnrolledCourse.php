<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class EnrolledCourse extends FlexibleDataTransferObject
{
    public int $id;

    public string $fullname;

    public string $shortname;
}
