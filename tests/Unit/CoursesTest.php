<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;
use NRBusinessSystems\LaraMoodle\Facades\LaraMoodle;

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

        $data = LaraMoodle::getCourses();

        $this->assertNotNull($data->courses);
        $this->assertCount(1, $data->courses);
        $this->assertEquals('My First Course', $data->courses[0]->fullname);
        $this->assertEquals('Intro Course', $data->courses[0]->shortname);
    }

    public function test_get_courses_by_category()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200)
        ]);

        $data = LaraMoodle::getCoursesByCategory(1);

        $this->assertNotNull($data->courses);
        $this->assertCount(1, $data->courses);
        $this->assertEquals('My First Course', $data->courses[0]->fullname);
        $this->assertEquals('Intro Course', $data->courses[0]->shortname);
    }

    public function test_get_course()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200)
        ]);

        $course = LaraMoodle::getCourse(2);

        $this->assertNotNull($course);
        $this->assertEquals('My First Course', $course->fullname);
        $this->assertEquals('Intro Course', $course->shortname);
    }

    public function test_get_course_contents()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseContents(), 200)
        ]);

        $contents = LaraMoodle::getCourseContents(2);

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

        $module = LaraMoodle::getCourseModule(1);

        $this->assertNotNull($module);
        $this->assertEquals('My first module', $module->cm->name);
    }

    public function test_get_course_pages()
    {
        Http::fake([
            '*' => Http::response(MockResponses::coursePages(), 200)
        ]);

        $pages = LaraMoodle::getCoursePages(2);

        $this->assertNotNull($pages);
        $this->assertEquals('My First Page', $pages->pages[0]->name);
        $this->assertEquals('Page Image.png', $pages->pages[0]->contentfiles[0]->filename);
    }

    public function test_get_course_scorm()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getScorms(), 200)
        ]);

        $scorms = LaraMoodle::getCourseScorms(3);

        $this->assertNotNull($scorms);
        $this->assertEquals('Example scorm', $scorms->scorms[0]->name);
        $this->assertEquals(3, $scorms->scorms[0]->course);
    }

    public function test_course_completion_activities()
    {
        Http::fake([
            '*' => Http::response(MockResponses::courseActivityStatuses(), 200)
        ]);

        $activityStatuses = LaraMoodle::getCourseActivitiesCompletion(2, 2);

        $this->assertNotNull($activityStatuses);
        $this->assertEquals('page', $activityStatuses->statuses[0]->modname);
        $this->assertEquals('1', $activityStatuses->statuses[0]->state);
    }
}
