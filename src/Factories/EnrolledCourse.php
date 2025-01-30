<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\EnrolledCourse as MoodleEnrolledCourse;

class EnrolledCourse extends MoodleFactory
{
    public function makeOne(): MoodleEnrolledCourse
    {
        return new MoodleEnrolledCourse([
            'fullname' => $this->faker->name(),
            'id' => $this->faker->randomNumber(),
            'shortname' => $this->faker->name(),
        ]);
    }
}
