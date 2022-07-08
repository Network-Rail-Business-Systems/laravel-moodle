<?php

namespace NetworkRailBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class GradingSummary extends DataTransferObject
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
