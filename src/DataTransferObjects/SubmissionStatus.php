<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class SubmissionStatus extends FlexibleDataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GradingSummary */
    public $gradingsummary;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\LastAttempt */
    public $lastattempt;

    /** @var null|array */
    public $feedback;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\PreviousAttempts[] */
    public $previousattempts;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
