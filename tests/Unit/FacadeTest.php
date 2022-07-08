<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class FacadeTest extends TestCase
{
    public function test_throws_exception_without_token()
    {
        $this->expectException(MoodleTokenMissingException::class);

        LaravelMoodle::getCourses();
    }
}
