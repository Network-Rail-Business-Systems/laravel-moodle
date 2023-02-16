<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GradingSummary extends FlexibleDataTransferObject
{
    /** @var int */
    public $participantcount;

    /** @var int */
    public $submissiondraftscount;

    /** @var int|boolean */
    public $submissionsenabled;

    /** @var int */
    public $submissionssubmittedcount;

    /** @var int */
    public $submissionsneedgradingcount;

    /** @var int|string */
    public $warnofungroupedusers;
}
