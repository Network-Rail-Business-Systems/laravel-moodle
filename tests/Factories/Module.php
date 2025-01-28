<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Module as MoodleModule;

class Module extends MoodleFactory
{
    public function makeOne(): MoodleModule
    {
        return new MoodleModule([
            'afterlink' => $this->faker->word(),
            'availability' => $this->faker->sentence(),
            'completion' => $this->faker->randomNumber(),
            'completiondata' => CompletionData::make(),
            'contents' => [],
            'contentsinfo' => [],
            'customdata' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'id' => $this->faker->randomNumber(),
            'indent' => $this->faker->randomNumber(),
            'instance' => $this->faker->randomNumber(),
            'modicon' => $this->faker->word(),
            'modname' => $this->faker->name(),
            'modplural' => $this->faker->word(),
            'name' => $this->faker->name(),
            'noviewlink' => $this->faker->boolean(),
            'onclick' => $this->faker->word(),
            'url' => $this->faker->url(),
            'uservisible' => $this->faker->boolean(),
            'visible' => $this->faker->randomNumber(),
            'visibleoncoursepage' => $this->faker->randomNumber(),
        ]);
    }
}
