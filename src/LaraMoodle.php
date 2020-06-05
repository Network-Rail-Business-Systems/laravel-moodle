<?php

namespace NRBusinessSystems\LaraMoodle;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Category;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseActivityStatuses;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseContent;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseEnrolledUser;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseModuleById;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CoursePages;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearch;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\getScorms;
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
     * Get courses for a specific category ID
     *
     * @param $categoryId
     * @return \Illuminate\Support\Collection
     */
    public function getCoursesByCategory($categoryId)
    {
        $courses = $this->http->asForm()
            ->post(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses_by_field&moodlewsrestformat=json",
                [
                    'field' => 'category',
                    'value' => $categoryId
                ]
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
    public function getCourse(int $id)
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
     * @param int $onlyEnrolled
     * @return CourseSearch
     */
    public function searchCourses(string $term, int $page = 0, int $perPage = 15, int $onlyEnrolled = 0)
    {
        $courses = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_search_courses",
                [
                    'criterianame' => 'search',
                    'criteariavalue' => $term,
                    'page' => $page,
                    'perpage' => $perPage,
                    'limittoenrolled' => $onlyEnrolled
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
    public function getCourseContents(int $id)
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
    public function getCourseModule($id)
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

    public function getCourseScorms(int $id)
    {
        $scorms = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_scorm_get_scorms_by_courses",
                [
                    'courseids' => [$id]
                ]
            )
            ->json();

        return new getScorms($scorms);
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
    public function enrolUserOnCourse(int $userId, int $courseId, $roleId = null)
    {
        $enrol = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json",
                [
                    'enrolements' => [
                        'roleid' => $roleId ?? config('laramoodle.student_role_id'),
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

    /**
     * Get badges for a specific user.
     * By default it will search for the current user and all courses without any parameters
     *
     * @param int $userId
     * @param int $courseId
     * @param string $search
     * @return array
     */
    public function getBadges(int $userId = 0, int $courseId = 0, string $search = '')
    {
        $badges = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_badges_get_user_badges&moodlewsrestformat=json",
                [
                    'userid' => $userId,
                    'courseid' => $courseId,
                    'search' => $search
                ]
            )
            ->json();

        return $badges;
    }

    /**
     * Return a collection of categories
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategories()
    {
        $categories = $this->http->asForm()
            ->get(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_categories&moodlewsrestformat=json"
            )
            ->json();

        return collect($categories)->map(function($category) {
            return new Category($category);
        });
    }

    /**
     * Search categories
     *
     * @param string $searchTerm
     * @param string $field
     * @return \Illuminate\Support\Collection
     */
    public function searchCategories(string $searchTerm, string $field = 'name')
    {
        $categories = $this->http->asForm()
            ->post(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_categories&moodlewsrestformat=json",
                [
                    'criteria' => [
                        'key' => $field,
                        'value' => $searchTerm
                    ]
                ]
            )
            ->json();

        return collect($categories)->map(function($category) {
            return new Category($category);
        });
    }
}
