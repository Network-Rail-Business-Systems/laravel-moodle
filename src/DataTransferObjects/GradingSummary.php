<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GradingSummary extends FlexibleDataTransferObject
{
    public int $participantcount;

    public int $submissiondraftscount;

    public int|bool $submissionsenabled;

    public int $submissionssubmittedcount;

    public int $submissionsneedgradingcount;

    public string|int $warnofungroupedusers;
}
