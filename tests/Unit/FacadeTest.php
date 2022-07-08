<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use NetworkRailBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

class FacadeTest extends TestCase
{
    public function test_throws_exception_without_token()
    {
        $this->expectException(MoodleTokenMissingException::class);

        LaraMoodle::getCourses();
    }
}
