<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PreviousAttempts extends DataTransferObject
{
    /** @var int */
    public $attemptnumber;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $submission;

    public $grade;

    public $feedbackplugins;
}
