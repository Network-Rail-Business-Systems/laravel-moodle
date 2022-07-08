<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LastAttempt extends DataTransferObject
{
    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $submission;

    /** @var null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Submission */
    public $teamsubmission;

    /** @var null|int */
    public $submissiongroup;

    /** @var array */
    public $submissiongroupmemberswhoneedtosubmit;

    /** @var int|boolean */
    public $submissionsenabled;

    /** @var int|boolean */
    public $locked;

    /** @var int|boolean */
    public $graded;

    /** @var int|boolean */
    public $canedit;

    /** @var int|boolean */
    public $caneditowner;

    /** @var int|boolean */
    public $cansubmit;

    /** @var null|int */
    public $extensionduedate;

    /** @var int|boolean */
    public $blindmarking;

    /** @var string */
    public $gradingstatus;

    /** @var array */
    public $usergroups;
}
