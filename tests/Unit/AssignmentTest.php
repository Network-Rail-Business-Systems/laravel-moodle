<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class AssignmentTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);
    }

    public function test_get_course_assignments()
    {
        Http::fake([
            '*' => Http::response(MockResponses::courseAssignments(), 200),
        ]);

        $data = LaravelMoodle::getCourseAssignments(3);

        $this->assertNotNull($data);
        $this->assertEquals('My First Course', $data->courses[0]->fullname);
        $this->assertEquals('Example course assignment', $data->courses[0]->assignments[0]->name);
    }

    public function test_get_course_assignment()
    {
        Http::fake([
            '*' => Http::response(MockResponses::courseAssignments(), 200),
        ]);

        $assignment = LaravelMoodle::getCourseAssignment(3, 16);

        $this->assertNotNull($assignment);
        $this->assertEquals(3, $assignment->course);
        $this->assertEquals('Example course assignment', $assignment->name);
    }

    public function test_save_course_assignment()
    {
        Http::fake([
            '*' => Http::response([], 200),
        ]);

        $this->assertTrue(LaravelMoodle::saveCourseAssignment(1, 'The assessment text content'));
    }

    public function test_unsuccessful_course_assignment()
    {
        Http::fake([
            '*' => Http::response([
                [
                    'item' => 'Nothing was submitted',
                    'itemid' => 1,
                    'warningcode' => 'couldnotsavesubmission',
                    'message' => 'Could not save submission',
                ],
            ]),
        ]);

        $submit = LaravelMoodle::saveCourseAssignment(1, '');

        $this->assertNotEmpty($submit);
        $this->assertEquals('Nothing was submitted', $submit[0]->item);
    }

    public function test_get_assignment_submission_attempts()
    {
        Http::fake([
            '*' => Http::response(MockResponses::assessmentStatus()),
        ]);

        $status = LaravelMoodle::getAssignmentSubmissionStatus(1);

        $this->assertNotNull($status);
        $this->assertEquals(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            $status->lastattempt->submission->plugins[0]->editorfields[0]->text
        );
    }
}
