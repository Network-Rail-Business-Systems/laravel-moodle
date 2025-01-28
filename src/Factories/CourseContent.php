<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseContent as MoodleCourseContent;

class CourseContent extends MoodleFactory
{
    public function makeOne(): MoodleCourseContent
    {
        return new MoodleCourseContent([
            'hiddenbynumsections' => $this->faker->randomNumber(),
            'id' => $this->faker->randomNumber(),
            'modules' => Module::makeMany(),
            'name' => $this->faker->name(),
            'section' => $this->faker->randomNumber(),
            'summary' => $this->faker->sentence(),
            'summaryformat' => $this->faker->randomNumber(),
            'uservisible' => $this->faker->boolean(),
            'visible' => $this->faker->randomNumber(),
        ]);
    }
}
