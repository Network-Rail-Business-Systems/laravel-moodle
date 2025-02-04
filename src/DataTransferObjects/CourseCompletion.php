<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseCompletion extends FlexibleDataTransferObject
{
    public CompletionStatus $completionstatus;

    public array $warnings;
}
