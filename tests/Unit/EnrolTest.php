<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

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
            '*' => Http::response(null, 200),
        ]);

        $enrol = LaravelMoodle::enrolUserOnCourse(1, 1, 5);

        $this->assertTrue($enrol);
    }

    public function test_enrol_user_on_course_without_role_id()
    {
        Http::fake([
            '*' => Http::response(null, 200),
        ]);

        $enrol = LaravelMoodle::enrolUserOnCourse(1, 1);

        $this->assertTrue($enrol);
    }

    public function test_unsuccessful_enrol_user_on_course()
    {
        Http::fake([
            '*' => Http::response(
                [
                    'exception' => 'invalid_parameter_exception',
                    'errorcode' => 'invalidparameter',
                    'message' => 'Invalid parameter value detected (Context does not exist)',
                ],
                200
            ),
        ]);

        $this->expectException(MoodleException::class);

        LaravelMoodle::enrolUserOnCourse(1, 1, 5);
    }

    public function test_get_enrolled_users_for_course()
    {
        Http::fake([
            '*' => Http::response(MockResponses::enrolledUsers(), 200),
        ]);

        $enrolledUsers = LaravelMoodle::getEnrolledUsersForCourse(2);

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
                'warnings' => [],
            ]),
        ]);

        $selfEnrol = LaravelMoodle::selfEnrolOnCourse(2);

        $this->assertNotNull($selfEnrol);
        $this->assertEquals(1, $selfEnrol->status);
    }

    public function test_unenrol_user_from_course()
    {
        Http::fake([
            '*' => Http::response(null, 200),
        ]);

        $enrol = LaravelMoodle::unenrolUserOnCourse(1, 1, 5);

        $this->assertTrue($enrol);
    }

    public function test_unenrol_user_from_course_without_role_id()
    {
        Http::fake([
            '*' => Http::response(null, 200),
        ]);

        $enrol = LaravelMoodle::unenrolUserOnCourse(1, 1);

        $this->assertTrue($enrol);
    }

    public function test_grades_return_as_null()
    {
        Http::fake([
            '*' => Http::response(['grades' => null], 200),
        ]);

        $userGrades = Laramoodle::getUserGrades(1);

        $this->assertNotNull($userGrades);
    }
}
