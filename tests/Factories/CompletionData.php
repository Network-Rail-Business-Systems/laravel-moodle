<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CompletionData as MoodleCompletionData;

class CompletionData extends MoodleFactory
{
    public function makeOne(): MoodleCompletionData
    {
        return new MoodleCompletionData([
            'state' => $this->faker->randomNumber(),
            'timecompleted' => $this->faker->unixTime(),
            'overrideby' => $this->faker->randomNumber(),
            'valueused' => $this->faker->boolean(),
        ]);
    }
}
