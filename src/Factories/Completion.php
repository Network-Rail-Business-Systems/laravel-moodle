<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion as MoodleCompletion;

class Completion extends MoodleFactory
{
    public function makeOne(): MoodleCompletion
    {
        return new MoodleCompletion([
            'complete' => $this->faker->boolean(),
            'details' => [],
            'status' => $this->faker->word(),
            'timecompleted' => $this->faker->randomNumber(),
            'title' => $this->faker->word(),
            'type' => $this->faker->randomNumber(),
        ]);
    }
}
