<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PreviousAttempts extends DataTransferObject
{
    /** @var int */
    public $attemptnumber;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Submission */
    public $submission;

    public $grade;

    public $feedbackplugins;
}
