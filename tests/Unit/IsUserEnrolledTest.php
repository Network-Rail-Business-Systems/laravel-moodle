<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class IsUserEnrolledTest extends TestCase
{
    public function test_user_is_enrolled_in_course(): void
    {
        Http::fake([
            '*' => Http::response(MockResponses::getUserCourses(), 200),
        ]);

        $this->assertTrue(
            LaravelMoodle::isUserEnrolled(2, 4)
        );
    }

    public function test_user_is_not_enrolled_in_course(): void
    {
        Http::fake([
            '*' => Http::response(MockResponses::getUserCourses(), 200),
        ]);

        $this->assertFalse(
            LaravelMoodle::isUserEnrolled(2, 99)
        );
    }
}
