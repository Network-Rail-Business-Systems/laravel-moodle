<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $data = LaravelMoodle::getCourses();

        $this->assertNotNull($data->courses);
        $this->assertCount(1, $data->courses);
        $this->assertEquals('My First Course', $data->courses[0]->fullname);
        $this->assertEquals('Intro Course', $data->courses[0]->shortname);
    }

    public function test_get_course_dates()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $data = LaravelMoodle::getCourses();

        $this->assertEquals('19/05/2020', $data->courses[0]->asDate('startdate')->format('d/m/Y'));
        $this->assertEquals('19/05/2020', $data->courses[0]->dates()->startdate->format('d/m/Y'));
    }

    public function test_get_courses_by_category()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $data = LaravelMoodle::getCoursesByCategory(1);

        $this->assertNotNull($data->courses);
        $this->assertCount(1, $data->courses);
        $this->assertEquals('My First Course', $data->courses[0]->fullname);
        $this->assertEquals('Intro Course', $data->courses[0]->shortname);
    }

    public function test_get_course()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $course = LaravelMoodle::getCourse(2);

        $this->assertNotNull($course);
        $this->assertEquals('My First Course', $course->fullname);
        $this->assertEquals('Intro Course', $course->shortname);
        $this->assertTrue($course->selfEnrol());
    }

    public function test_get_course_not_found()
    {
        Http::fake([
            '*' => Http::response(['courses' => [], 'warnings' => []]),
        ]);

        $this->expectException(NotFoundHttpException::class);

        LaravelMoodle::getCourse(999);
    }

    public function test_get_course_contents()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseContents(), 200),
        ]);

        $contents = LaravelMoodle::getCourseContents(2);

        $this->assertNotNull($contents);
        $this->assertCount(1, $contents);
        $this->assertEquals('General', $contents[0]->name);
        $this->assertEquals('Announcements', $contents[0]->modules[0]->name);
        $this->assertTrue($contents[0]->modules[1]->hasPage());
        $this->assertFalse($contents[0]->modules[1]->hasScorm());
        $this->assertEquals(3, $contents[0]->modules[1]->getActivityId());
    }

    public function test_search_courses()
    {
        Http::fake([
            '*' => Http::response(MockResponses::searchCourses(), 200),
        ]);

        $searchResults = LaravelMoodle::searchCourses('my first course');

        $this->assertNotNull($searchResults);
        $this->assertEquals(1, $searchResults->total);
        $this->assertEquals('My First Course', $searchResults->courses[0]->fullname);
        $this->assertEquals('Intro Course', $searchResults->courses[0]->shortname);
    }

    public function test_get_course_module_by_id()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseModule(), 200),
        ]);

        $module = LaravelMoodle::getCourseModule(1);

        $this->assertNotNull($module);
        $this->assertEquals('My first module', $module->cm->name);
    }

    public function test_get_course_pages()
    {
        Http::fake([
            '*' => Http::response(MockResponses::coursePages(), 200),
        ]);

        $pages = LaravelMoodle::getCoursePages(2);

        $this->assertNotNull($pages);
        $this->assertEquals('My First Page', $pages->pages[0]->name);
        $this->assertEquals('Page Image.png', $pages->pages[0]->contentfiles[0]->filename);
    }

    public function test_get_course_page()
    {
        Http::fake([
            '*' => Http::response(MockResponses::coursePages(), 200),
        ]);

        $page = LaravelMoodle::getCoursePage(2, 2);

        $this->assertNotNull($page);
        $this->assertEquals('My First Page', $page->name);
        $this->assertEquals('Page Image.png', $page->contentfiles[0]->filename);
    }

    public function test_get_course_scorms()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getScorms(), 200),
        ]);

        $scorms = LaravelMoodle::getCourseScorms(3);

        $this->assertNotNull($scorms);
        $this->assertEquals('Example scorm', $scorms->scorms[0]->name);
        $this->assertEquals(3, $scorms->scorms[0]->course);
    }

    public function test_get_course_scorm()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getScorms(), 200),
        ]);

        $scorm = LaravelMoodle::getCourseScorm(3, 17);

        $this->assertNotNull($scorm);
        $this->assertEquals('Example scorm', $scorm->name);
        $this->assertEquals(3, $scorm->course);
    }

    public function test_course_completion_activities()
    {
        Http::fake([
            '*' => Http::response(MockResponses::courseActivityStatuses(), 200),
        ]);

        $activityStatuses = LaravelMoodle::getCourseActivitiesCompletion(2, 2);

        $this->assertNotNull($activityStatuses);
        $this->assertEquals('page', $activityStatuses->statuses[0]->modname);
        $this->assertEquals('1', $activityStatuses->statuses[0]->state);
    }

    public function test_has_course_images()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $data = LaravelMoodle::getCourses();

        $this->assertEquals('4251.png', $data->courses[0]->getImage()->filename);
        $this->assertCount(1, $data->courses[0]->getImages());
    }

    public function test_has_custom_fields()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourses(), 200),
        ]);

        $data = LaravelMoodle::getCourses();

        $this->assertCount(2, $data->courses[0]->getCustomFields());
        $this->assertEquals('1 week', $data->courses[0]->getCustomField('duration'));
        $this->assertEquals(null, $data->courses[0]->getCustomField('nonmatchingfield'));
    }

    public function test_course_name_with_html_entities()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getHtmlCourses(), 200),
        ]);

        $data = LaravelMoodle::getCourses();

        $this->assertEquals('Course With & < html >', $data->courses[0]->fullname());
    }
}
