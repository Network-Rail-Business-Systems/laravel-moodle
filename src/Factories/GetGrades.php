<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetGrades as MoodleGetGrades;

class GetGrades extends MoodleFactory
{
    public function makeOne(): MoodleGetGrades
    {
        return new MoodleGetGrades([
            'grades' => Grade::makeMany(),
            'warnings' => Warning::makeMany(),
        ]);
    }
}
