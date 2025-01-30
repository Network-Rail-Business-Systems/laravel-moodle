<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CompletionStatus as MoodleCompletionStatus;

class CompletionStatus extends MoodleFactory
{
    public function makeOne(): MoodleCompletionStatus
    {
        return new MoodleCompletionStatus([
            'aggregation' => $this->faker->randomNumber(),
            'completed' => $this->faker->boolean(),
            'completions' => Completion::makeMany(),
        ]);
    }
}
