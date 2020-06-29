<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleException;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;
use NRBusinessSystems\LaraMoodle\Facades\LaraMoodle;

class EnrolTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        session(['moodle-token' => 'ABC123']);
    }

    public function test_successful_enrol_user_on_course()
    {
        Http::fake([
            '*' => Http::response(null, 200)
        ]);

        $enrol = LaraMoodle::enrolUserOnCourse(1, 1, 5);

        $this->assertTrue($enrol);
    }

    public function test_enrol_user_on_course_without_role_id()
    {
        Http::fake([
            '*' => Http::response(null, 200)
        ]);

        $enrol = LaraMoodle::enrolUserOnCourse(1, 1);

        $this->assertTrue($enrol);
    }

    public function test_unsuccessful_enrol_user_on_course()
    {
        Http::fake([
            '*' => Http::response([
                "exception" => "invalid_parameter_exception",
                "errorcode" => "invalidparameter",
                "message" => "Invalid parameter value detected (Context does not exist)"
            ], 200)
        ]);

        $this->expectException(MoodleException::class);

        LaraMoodle::enrolUserOnCourse(1, 1, 5);
    }

    public function test_get_enrolled_users_for_course()
    {
        Http::fake([
            '*' => Http::response(MockResponses::enrolledUsers(), 200)
        ]);

        $enrolledUsers = LaraMoodle::getEnrolledUsersForCourse(2);

        $this->assertNotNull($enrolledUsers);
        $this->assertEquals('Test User', $enrolledUsers[0]->fullname);
        $this->assertEquals('student', $enrolledUsers[0]->roles[0]->shortname);
        $this->assertEquals('My First Course', $enrolledUsers[0]->enrolledcourses[0]->fullname);
        $this->assertEquals('Short Course', $enrolledUsers[0]->enrolledcourses[0]->shortname);
    }

    public function test_self_enrol_user_on_course()
    {
        Http::fake([
            '*' => Http::response([
                'status' => true,
                'warnings' => []
            ])
        ]);

        $selfEnrol = LaraMoodle::selfEnrolOnCourse(2);

        $this->assertNotNull($selfEnrol);
        $this->assertEquals(1, $selfEnrol->status);
    }
}
