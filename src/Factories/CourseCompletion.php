<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseCompletion as MoodleCourseCompletion;

class CourseCompletion extends MoodleFactory
{
    public function makeOne(): MoodleCourseCompletion
    {
        return new MoodleCourseCompletion([
            'completionstatus' => CompletionStatus::make(),
            'warnings' => Warning::makeMany(),
        ]);
    }
}
