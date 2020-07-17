<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SubmissionStatus extends DataTransferObject
{
    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\GradingSummary */
    public $gradingsummary;

    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\LastAttempt */
    public $lastattempt;

    /** @var null|array */
    public $feedback;

    /** @var null|\NRBusinessSystems\LaraMoodle\DataTransferObjects\PreviousAttempts[] */
    public $previousattempts;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning[] */
    public $warnings;
}
