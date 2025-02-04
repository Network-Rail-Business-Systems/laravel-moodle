<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class LastAttempt extends FlexibleDataTransferObject
{
    public ?Submission $submission;

    public ?Submission $teamsubmission;

    public ?int $submissiongroup;

    public array $submissiongroupmemberswhoneedtosubmit;

    public bool $submissionsenabled;

    public bool $locked;

    public bool $graded;

    public bool $canedit;

    public bool $caneditowner;

    public bool $cansubmit;

    public ?int $extensionduedate;

    public bool $blindmarking;

    public string $gradingstatus;

    public array $usergroups;
}
