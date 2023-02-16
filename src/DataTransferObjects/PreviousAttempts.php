<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class PreviousAttempts extends FlexibleDataTransferObject
{
    /** @var int */
    public $attemptnumber;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $submission;

    public $grade;

    public $feedbackplugins;
}
