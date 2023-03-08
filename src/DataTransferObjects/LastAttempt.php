<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class LastAttempt extends FlexibleDataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $submission;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $teamsubmission;

    /** @var null|int */
    public $submissiongroup;

    /** @var array */
    public $submissiongroupmemberswhoneedtosubmit;

    /** @var int|bool */
    public $submissionsenabled;

    /** @var int|bool */
    public $locked;

    /** @var int|bool */
    public $graded;

    /** @var int|bool */
    public $canedit;

    /** @var int|bool */
    public $caneditowner;

    /** @var int|bool */
    public $cansubmit;

    /** @var null|int */
    public $extensionduedate;

    /** @var int|bool */
    public $blindmarking;

    /** @var string */
    public $gradingstatus;

    /** @var array */
    public $usergroups;
}
