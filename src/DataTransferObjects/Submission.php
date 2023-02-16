<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Submission extends FlexibleDataTransferObject
{
    /** @var int */
    public $id;

    /** @var int */
    public $userid;

    /** @var int */
    public $attemptnumber;

    /** @var int */
    public $timecreated;

    /** @var int */
    public $timemodified;

    /** @var string */
    public $status;

    /** @var int */
    public $groupid;

    /** @var int */
    public $assignment;

    /** @var int */
    public $latest;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Plugin[] */
    public $plugins;

    /** @var null|string */
    public $gradingstatus;
}
