<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class SubmissionStatus extends FlexibleDataTransferObject
{
    public ?GradingSummary $gradingsummary;

    public ?LastAttempt $lastattempt;

    public ?array $feedback;

    /** @var null|PreviousAttempts[] */
    public ?array $previousattempts;

    /** @var Warning[] */
    public array $warnings;
}
