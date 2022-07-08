<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

class GradesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);

        Http::fake([
            '*' => Http::response(MockResponses::getGrades(), 200),
        ]);
    }

    public function test_get_grades()
    {
        $grades = LaraMoodle::getUserGrades();

        $this->assertEquals('B', $grades->grades[0]->grade);
        $this->assertEquals('2', $grades->grades[0]->courseid);
        $this->assertEquals('A', $grades->grades[1]->grade);
        $this->assertEquals('3', $grades->grades[1]->courseid);
    }

    public function test_get_course_grade()
    {
        $courseGrade = LaraMoodle::getCourseGrade(2);

        $this->assertNotNull($courseGrade);
        $this->assertEquals('B', $courseGrade->grade);
        $this->assertEquals('2', $courseGrade->courseid);
    }

    public function test_get_course_grade_for_nonexisting_course()
    {
        $courseGrade = LaraMoodle::getCourseGrade(4);

        $this->assertNull($courseGrade->grade);
        $this->assertEquals('4', $courseGrade->courseid);
    }
}
