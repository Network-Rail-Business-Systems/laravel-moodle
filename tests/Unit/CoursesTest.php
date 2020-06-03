<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;
use NRBusinessSystems\LaraMoodle\Facade as LaraMoodle;

class CoursesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);

        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200)
        ]);
    }

    public function test_get_courses()
    {
        $courses = LaraMoodle::getCourses();

        $this->assertNotNull($courses);
        $this->assertCount(1, $courses);
        $this->assertEquals('My First Course', $courses[0]->fullname);
        $this->assertEquals('Intro Course', $courses[0]->shortname);
    }

    public function test_get_course_by_id()
    {
        $course = LaraMoodle::getCourseById(2);

        $this->assertNotNull($course);
        $this->assertEquals('My First Course', $course->fullname);
        $this->assertEquals('Intro Course', $course->shortname);
    }
}
