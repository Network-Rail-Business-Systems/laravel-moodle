<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class PreviousAttempts extends DataTransferObject
{
    /** @var int */
    public $attemptnumber;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Submission */
    public $submission;

    public $grade;

    public $feedbackplugins;
}
