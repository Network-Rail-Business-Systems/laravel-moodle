<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SubmissionStatus extends DataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\GradingSummary */
    public $gradingsummary;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\LastAttempt */
    public $lastattempt;

    /** @var null|array */
    public $feedback;

    /** @var null|\NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\PreviousAttempts[] */
    public $previousattempts;

    /** @var \NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
