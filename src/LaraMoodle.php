<?php

namespace NRBusinessSystems\LaraMoodle;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseActivityStatuses;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseContent;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseEnrolledUser;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseModuleById;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CoursePages;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearch;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetUsers;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleException;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Course;

class LaraMoodle
{
    private $http;
    private $token;

    public function __construct()
    {
        $this->http = Http::withOptions([
            'base_uri' => config('laramoodle.base_url')
        ]);

        if(!session()->has('moodle-token')) {
            throw new MoodleTokenMissingException();
        }

        $this->token = session('moodle-token');
    }

    /**
     * Get a collection course objects
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCourses()
    {
        $courses = $this->http->get(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses&moodlewsrestformat=json"
            )
            ->json();

        return collect($courses)->map(function($course) {
            return new Course($course);
        });
    }

    /**
     * Return a course object for the id
     *
     * @param $id
     * @return Course
     */
    public function getCourseById(int $id)
    {
        $course = $this->http->asForm()
            ->post(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses&moodlewsrestformat=json",
                [
                    'options' => [
                        'ids' => [$id]
                    ]
                ]
            )
            ->json();

        return new Course($course[0]);
    }

    /**
     * @param string $term
     * @param int $page
     * @param int $perPage
     * @return CourseSearch
     */
    public function searchCourses(string $term, int $page = 0, int $perPage = 15)
    {
        $courses = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_search_courses",
                [
                    'criterianame' => 'search',
                    'criteariavalue' => $term,
                    'page' => $page,
                    'perpage' => $perPage
                ]
            )
            ->json();

        return new CourseSearch($courses);
    }

    /**
     * Get the contents for a course
     *
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function getCourseContentsById(int $id)
    {
        $courseContents = $this->http->get(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_contents&courseid={$id}"
            )
            ->json();

        return collect($courseContents)->map(function($content) {
            return new CourseContent($content);
        });
    }

    /**
     * Get a course module by the module id
     *
     * @param $id
     * @return CourseModuleById
     */
    public function getCourseModuleById($id)
    {
        $module = $this->http
            ->get(
                "?wstoken=3a52dd83512957fc724122bf4853a2a8&moodlewsrestformat=json&wsfunction=core_course_get_course_module&cmid={$id}"
            )->json();

        return new CourseModuleById($module);
    }

    /**
     * Get the pages for a specific course
     *
     * @param $id
     * @return CoursePages
     */
    public function getCoursePages(int $id)
    {
        $pages = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_page_get_pages_by_courses",
                [
                    'courseids' => [$id]
                ]
            )
            ->json();

        return new CoursePages($pages);
    }

    /**
     * TODO implement data transfer object for response
     * @param int $userId
     * @param int $courseId
     * @return array
     * @throws MoodleException
     */
    public function getCourseCompletion(int $userId, int $courseId)
    {
        $completion = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_completion_get_course_completion_status",
                [
                    'courseid' => $courseId,
                    'userid' => $userId
                ]
            )
            ->json();

        if(isset($completion['exception'])) {
            throw new MoodleException($completion['message']);
        }

        return $completion;
    }

    /**
     * Get course activities completion
     *
     * @param int $userId
     * @param int $courseId
     * @return CourseActivityStatuses
     * @throws MoodleException
     */
    public function getCourseActivitiesCompletion(int $userId, int $courseId)
    {
        $completion = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_completion_get_activities_completion_status",
                [
                    'courseid' => $courseId,
                    'userid' => $userId
                ]
            )
            ->json();

        if(isset($completion['exception'])) {
            throw new MoodleException($completion['message']);
        }

        return new CourseActivityStatuses($completion);

    }

    /**
     * Get a list of users matching the search term and the field
     *
     * @param string $searchTerm
     * @param string $field
     * @return GetUsers
     */
    public function searchUsers(string $searchTerm, string $field = 'username')
    {
        $users = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_user_get_users&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => $field,
                            'value' => $searchTerm
                        ]
                    ]
                ]
            )
            ->json();

        return new GetUsers($users);
    }


    /**
     * Enrol user on a course, default role of student, but can be overwritten
     *
     * @param int $userId
     * @param int $courseId
     * @param int $roleId
     * @return bool
     * @throws MoodleException
     */
    public function enrolUserOnCourse(int $userId, int $courseId, $roleId = 5)
    {
        $enrol = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json",
                [
                    'enrolements' => [
                        'roleid' => $roleId,
                        'userid' => $userId,
                        'courseid' => $courseId
                    ]
                ]
            )
            ->json();

        if (isset($enrol['exception'])) {
            throw new MoodleException($enrol['message']);
        }

        return true;
    }

    /**
     * Get a collection of users enrolled on a course
     *
     * @param int $courseId
     * @return \Illuminate\Support\Collection
     */
    public function getEnrolledUsersForCourse(int $courseId)
    {
        $enrolledUsers = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_enrol_get_enrolled_users&moodlewsrestformat=json",
                [
                    'courseid' => $courseId
                ]
            )
            ->json();

        return collect($enrolledUsers)->map(function($user) {
            return new CourseEnrolledUser($user);
        });
    }


}
