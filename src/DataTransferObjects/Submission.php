<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Submission extends FlexibleDataTransferObject
{
    public int $id;

    public int $userid;

    public int $attemptnumber;

    public int $timecreated;

    public int $timemodified;

    public string $status;

    public int $groupid;

    public int $assignment;

    public int $latest;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Plugin[] */
    public array $plugins;

    public ?string $gradingstatus;
}
