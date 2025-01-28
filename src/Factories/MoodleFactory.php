<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use Illuminate\Foundation\Testing\WithFaker;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

abstract class MoodleFactory
{
    use WithFaker;

    final public function __construct()
    {
        $this->setUpFaker();
    }

    public static function make(): FlexibleDataTransferObject
    {
        $factory = new static;

        return $factory->makeOne();
    }

    public static function makeMany(int $count = 3): array
    {
        $data = [];
        $factory = new static;

        for ($current = 0; $current < $count; $current++) {
            $data[] = $factory->makeOne();
        }

        return $data;
    }

    abstract public function makeOne(): FlexibleDataTransferObject;
}
