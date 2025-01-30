<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Role as MoodleRole;

class Role extends MoodleFactory
{
    public function makeOne(): MoodleRole
    {
        return new MoodleRole([
            'name' => $this->faker->name(),
            'roleid' => $this->faker->randomNumber(),
            'shortname' => $this->faker->name(),
            'sortorder' => $this->faker->randomNumber(),
        ]);
    }
}
