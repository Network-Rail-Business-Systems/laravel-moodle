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
    }

    public function test_get_courses()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200)
        ]);

        $courses = LaraMoodle::getCourses();

        $this->assertNotNull($courses);
        $this->assertCount(1, $courses);
        $this->assertEquals('My First Course', $courses[0]->fullname);
        $this->assertEquals('Intro Course', $courses[0]->shortname);
    }

    public function test_get_course_by_id()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200)
        ]);

        $course = LaraMoodle::getCourseById(2);

        $this->assertNotNull($course);
        $this->assertEquals('My First Course', $course->fullname);
        $this->assertEquals('Intro Course', $course->shortname);
    }

    public function test_get_course_contents()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseContents(), 200)
        ]);

        $contents = LaraMoodle::getCourseContentsById(2);

        $this->assertNotNull($contents);
        $this->assertCount(1, $contents);
        $this->assertEquals('General', $contents[0]->name);
        $this->assertEquals('Announcements', $contents[0]->modules[0]->name);
    }

    public function test_search_courses()
    {
        Http::fake([
            '*' => Http::response(MockResponses::searchCourses(), 200)
        ]);

        $searchResults = LaraMoodle::searchCourses('my first course');

        $this->assertNotNull($searchResults);
        $this->assertEquals(1, $searchResults->total);
        $this->assertEquals('My First Course', $searchResults->courses[0]->fullname);
        $this->assertEquals('Intro Course', $searchResults->courses[0]->shortname);
    }

    public function test_get_course_module_by_id()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseModule(), 200)
        ]);

        $module = LaraMoodle::getCourseModuleById(1);

        $this->assertNotNull($module);
        $this->assertEquals('My first module', $module->cm->name);
    }
}
