<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class SubmissionStatus extends FlexibleDataTransferObject
{
    public ?GradingSummary $gradingsummary;

    public ?LastAttempt $lastattempt;

    public ?array $feedback;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\PreviousAttempts[] */
    public ?array $previousattempts;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning[] */
    public array $warnings;
}
