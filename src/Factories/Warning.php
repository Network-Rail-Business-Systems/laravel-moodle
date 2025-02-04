<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning as MoodleWarning;

class Warning extends MoodleFactory
{
    public function makeOne(): MoodleWarning
    {
        return new MoodleWarning([
            'item' => $this->faker->word(),
            'itemid' => $this->faker->randomNumber(),
            'warningcode' => $this->faker->word(),
            'message' => $this->faker->sentence(),
        ]);
    }
}
