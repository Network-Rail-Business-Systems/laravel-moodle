<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CustomField as MoodleCustomField;

class CustomField extends MoodleFactory
{
    public function makeOne(): MoodleCustomField
    {
        return new MoodleCustomField([
            'name' => $this->faker->name(),
            'shortname' => $this->faker->name(),
            'type' => $this->faker->word(),
            'value' => $this->faker->word(),
        ]);
    }
}
