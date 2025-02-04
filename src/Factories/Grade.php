<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Grade as MoodleGrade;

class Grade extends MoodleFactory
{
    public function makeOne(): MoodleGrade
    {
        return new MoodleGrade([
            'courseid' => $this->faker->randomNumber(),
            'grade' => $this->faker->word(),
            'rawgrade' => $this->faker->word(),
        ]);
    }
}
