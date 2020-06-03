<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;
use NRBusinessSystems\LaraMoodle\Facade as LaraMoodle;

class CourseContentsTest extends TestCase
{
    public function test_get_course_contents()
    {
        Http::fake([
            '*' => Http::response(MockResponses::getCourseContents(), 200)
        ]);

        session(['moodle-token' => 'ABC123']);

        $contents = LaraMoodle::getCourseContentsById(2);

        $this->assertNotNull($contents);
        $this->assertCount(1, $contents);
        $this->assertEquals('General', $contents[0]->name);
        $this->assertEquals('Announcements', $contents[0]->modules[0]->name);
    }
}
