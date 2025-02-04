<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class PreviousAttempts extends FlexibleDataTransferObject
{
    public int $attemptnumber;

    public Submission $submission;

    public mixed $grade;

    public mixed $feedbackplugins;
}
