<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CompletionData as MoodleCompletionData;

class AssignmentConfig extends MoodleFactory
{
    public function makeOne(): MoodleCompletionData
    {
        return new MoodleCompletionData([
            'name' => $this->faker->word(),
            'plugin' => $this->faker->word(),
            'subtype' => $this->faker->word(),
            'value' => $this->faker->word(),
        ]);
    }
}
