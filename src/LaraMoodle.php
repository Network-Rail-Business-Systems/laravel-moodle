<?php

namespace NRBusinessSystems\LaraMoodle;

use GuzzleHttp\Profiling\Debugbar\Profiler;
use GuzzleHttp\Profiling\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CalendarMonthly;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Category;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Course;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseActivityStatuses;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseCompletion;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseContent;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseEnrolledUser;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseModuleById;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CoursePages;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearch;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetBadges;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetCourseAssignments;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetCoursesByField;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetGrades;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetResources;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\getScorms;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\GetUsers;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Grade;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\SelfEnrol;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\SubmissionStatus;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Warning;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleException;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;

class LaraMoodle
{
    private $http;
    private $token;

    public function __construct()
    {
        if (!session()->has('moodle-token')) {
            throw new MoodleTokenMissingException();
        }

        $this->token = session('moodle-token');

        $this->http = Http::withOptions([
            'base_uri' => config('laramoodle.base_url'),
        ]);

        if (config('laramoodle.debug')) {
            $debugbar = App::make('debugbar');
            $this->http->withMiddleware(new Middleware(new Profiler($debugbar->getCollector('time'))));
        }
    }

    /**
     * Get a collection course objects
     *
     * @param string $term
     * @param string $field
     * @return GetCoursesByField
     */
    public function getCourses(string $term = '', string $field = '')
    {
        $courses = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_courses_by_field",
                [
                    'field' => $field,
                    'value' => $term,
                ]
            )
            ->json();

        return new GetCoursesByField($courses);
    }

    /**
     * Get courses for a specific category ID
     *
     * @param $categoryId
     * @return GetCoursesByField
     */
    public function getCoursesByCategory($categoryId)
    {
        $courses = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses_by_field&moodlewsrestformat=json",
                [
                    'field' => 'category',
                    'value' => $categoryId,
                ]
            )
            ->json();

        return new GetCoursesByField($courses);
    }

    /**
     * Return a course object for the id
     *
     * @param $id
     * @return Course
     */
    public function getCourse(int $id)
    {
        $courses = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses_by_field&moodlewsrestformat=json",
                [
                    'field' => 'id',
                    'value' => $id,
                ]
            )
            ->json();

        abort_if(empty($courses['courses']), '404', 'Course not found');

        return new Course($courses['courses'][0]);
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
        $courses = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_search_courses",
                [
                    'criterianame' => 'search',
                    'criteriavalue' => $term,
                    'page' => $page,
                    'perpage' => $perPage,
                    'limittoenrolled' => $onlyEnrolled,
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
        $courseContents = $this->http
            ->get(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_contents&courseid={$id}"
            )
            ->json();

        if (isset($courseContents['exception'])) {
            throw new MoodleException($courseContents['message']);
        }

        return collect($courseContents)->map(function ($content) {
            return new CourseContent($content);
        });
    }

    /**
     * Get a course module by the module id
     *
     * @param $id
     * @return CourseModuleById
     */
    public function getCourseModule(int $id)
    {
        $module = $this->http
            ->get(
                "/webservice/rest/server.php?wstoken=3a52dd83512957fc724122bf4853a2a8&moodlewsrestformat=json&wsfunction=core_course_get_course_module&cmid={$id}"
            )
            ->json();

        return new CourseModuleById($module);
    }

    /**
     * Get the pages for a specific course
     *
     * @param $id
     * @return CoursePages
     */
    public function getCoursePages(int $courseId)
    {
        $pages = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_page_get_pages_by_courses",
                [
                    'courseids' => [$courseId],
                ]
            )
            ->json();

        return new CoursePages($pages);
    }

    /**
     * Get a specific page for a course
     *
     * @param int $courseId
     * @param int $pageId
     * @return mixed
     */
    public function getCoursePage(int $courseId, int $moduleId)
    {
        return collect($this->getCoursePages($courseId)->pages)
            ->filter(function ($value) use ($moduleId) {
                return $value->coursemodule == $moduleId;
            })
            ->first();
    }

    /**
     * @param int $courseId
     * @return getScorms
     */
    public function getCourseScorms(int $courseId)
    {
        $scorms = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_scorm_get_scorms_by_courses",
                [
                    'courseids' => [$courseId],
                ]
            )
            ->json();

        return new getScorms($scorms);
    }

    /**
     * @param int $courseId
     * @param int $moduleId
     */
    public function getCourseScorm(int $courseId, int $moduleId)
    {
        return collect($this->getCourseScorms($courseId)->scorms)
            ->filter(function ($item) use ($moduleId) {
                return $item->coursemodule == $moduleId;
            })
            ->first();
    }

    /**
     * @param int $courseId
     * @return GetResources
     */
    public function getCourseResources(int $courseId)
    {
        $resources = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_resource_get_resources_by_courses",
                [
                    'courseids' => [$courseId],
                ]
            )
            ->json();

        return new GetResources($resources);
    }

    /**
     * @param int $courseId
     * @param int $moduleId
     * @return mixed
     */
    public function getCourseResource(int $courseId, int $moduleId)
    {
        return collect($this->getCourseResources($courseId)->resources)
            ->filter(function ($item) use ($moduleId) {
                return $item->coursemodule == $moduleId;
            })
            ->first();
    }

    /**
     *
     * @param int $userId
     * @param int $courseId
     * @return CourseCompletion
     * @throws MoodleException
     */
    public function getCourseCompletion(int $userId, int $courseId)
    {
        $completion = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_completion_get_course_completion_status",
                [
                    'courseid' => $courseId,
                    'userid' => $userId,
                ]
            )
            ->json();

        if (isset($completion['exception'])) {
            throw new MoodleException($completion['message']);
        }

        return new CourseCompletion($completion);
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
        $completion = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_completion_get_activities_completion_status",
                [
                    'courseid' => $courseId,
                    'userid' => $userId,
                ]
            )
            ->json();

        if (isset($completion['exception'])) {
            throw new MoodleException($completion['message']);
        }

        return new CourseActivityStatuses($completion);
    }

    /**
     * @param $courseId
     * @return GetCourseAssignments
     */
    public function getCourseAssignments(int $courseId)
    {
        $assignments = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_assign_get_assignments",
                [
                    'courseids' => [$courseId],
                ]
            )
            ->json();

        return new GetCourseAssignments($assignments);
    }

    public function getCourseAssignment(int $courseId, int $moduleId)
    {
        return collect($this->getCourseAssignments($courseId)->courses[0]->assignments)
            ->filter(function ($item) use ($moduleId) {
                return $item->cmid == $moduleId;
            })
            ->first();
    }

    public function getAssignmentSubmissionStatus(int $assignmentId, int $userId = 0)
    {
        $submissionStatus = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_assign_get_submission_status",
                [
                    'assignid' => $assignmentId,
                    'userid' => $userId,
                ]
            )
            ->json();

        return new SubmissionStatus($submissionStatus);
    }

    /**
     * @param int $assignmentId
     * @param string $content
     * @param int $format
     * @param int $itemId
     * @return bool|\Illuminate\Support\Collection
     * @throws MoodleException
     */
    public function saveCourseAssignment(int $assignmentId, string $content = '', int $format = 1, int $itemId = 1)
    {
        $assignment = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_assign_save_submission",
                [
                    'assignmentid' => $assignmentId,
                    'plugindata' => [
                        'onlinetext_editor' => [
                            'text' => $content,
                            'format' => $format,
                            'itemid' => $itemId,
                        ],
                    ],
                ]
            )
            ->json();

        if (isset($assignment['exception'])) {
            throw new MoodleException($assignment['message']);
        }

        if (count($assignment) > 0) {
            return collect($assignment)->map(function ($warning) {
                return new Warning($warning);
            });
        }

        return true;
    }

    /**
     * Get a user's grades
     *
     * @param int $userId
     * @return GetGrades
     */
    public function getUserGrades($userId = 0)
    {
        $grades = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=gradereport_overview_get_course_grades",
                [
                    'userid' => $userId,
                ]
            )
            ->json();

        return new GetGrades($grades);
    }

    public function getCourseGrade($courseId, $userId = 0)
    {
        return collect($this->getUserGrades($userId)->grades)
            ->where('courseid', '=', $courseId)
            ->whenEmpty(function ($collection) use ($courseId) {
                return $collection->push(
                    new Grade([
                        'grade' => null,
                        'courseid' => $courseId,
                        'rawgrade' => null,
                    ])
                );
            })
            ->first();
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
        $users = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_user_get_users&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => $field,
                            'value' => $searchTerm,
                        ],
                    ],
                ]
            )
            ->json();

        return new GetUsers($users);
    }

    /**
     * Enrol user on a course, default role of student, but can be overwritten
     * User must be Admin or Manager site role in Moodle or a Course Teacher
     *
     * @param int $userId
     * @param int $courseId
     * @param int $roleId
     * @return bool
     * @throws MoodleException
     */
    public function enrolUserOnCourse(int $userId, int $courseId, $roleId = null)
    {
        $enrol = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json",
                [
                    'enrolments' => [
                        [
                            'roleid' => $roleId ?? config('laramoodle.student_role_id'),
                            'userid' => $userId,
                            'courseid' => $courseId,
                        ],
                    ],
                ]
            )
            ->json();

        if (isset($enrol['exception'])) {
            throw new MoodleException($enrol['message']);
        }

        return true;
    }

    /**
     * Self enrol current user on a course with optional enrollment key
     *
     * @param int $courseId
     * @return SelfEnrol
     * @throws MoodleException
     */
    public function selfEnrolOnCourse(int $courseId, $enrollmentKey = '', $instanceId = 0)
    {
        $enrol = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=enrol_self_enrol_user",
                [
                    'courseid' => $courseId,
                    'password' => $enrollmentKey,
                    'instanceid' => $instanceId,
                ]
            )
            ->json();

        if (isset($enrol['exception'])) {
            throw new MoodleException($enrol['message']);
        }

        return new SelfEnrol($enrol);
    }

    /**
     * Get a collection of users enrolled on a course
     *
     * @param int $courseId
     * @return \Illuminate\Support\Collection
     */
    public function getEnrolledUsersForCourse(int $courseId)
    {
        $enrolledUsers = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_enrol_get_enrolled_users&moodlewsrestformat=json",
                [
                    'courseid' => $courseId,
                ]
            )
            ->json();

        return collect($enrolledUsers)->map(function ($user) {
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
     * @return GetBadges
     */
    public function getBadges(int $userId = 0, int $courseId = 0, string $search = '')
    {
        $badges = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_badges_get_user_badges&moodlewsrestformat=json",
                [
                    'userid' => $userId,
                    'courseid' => $courseId,
                    'search' => $search,
                ]
            )
            ->json();

        return new GetBadges($badges);
    }

    /**
     * Return a collection of categories
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategories()
    {
        $categories = $this->http
            ->asForm()
            ->get(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_categories&moodlewsrestformat=json"
            )
            ->json();

        return collect($categories)->map(function ($category) {
            return new Category($category);
        });
    }

    /**
     * Search categories with exact match only
     *
     * @param string $searchTerm
     * @param string $field
     * @return \Illuminate\Support\Collection
     */
    public function searchCategories(string $searchTerm, string $field = 'name')
    {
        $categories = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_categories&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => $field,
                            'value' => $searchTerm,
                        ],
                    ],
                ]
            )
            ->json();

        return collect($categories)->map(function ($category) {
            return new Category($category);
        });
    }

    /**
     * Simulate the page viewed event
     *
     * @param $pageId
     * @return bool
     * @throws MoodleException
     */
    public function viewPageEvent(int $pageId)
    {
        $page = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=mod_page_view_page&moodlewsrestformat=json",
                [
                    'pageid' => $pageId,
                ]
            )
            ->json();

        if (isset($page['exception'])) {
            throw new MoodleException($page['message']);
        }

        return $page['status'];
    }

    /**
     * Mark a resource as viewed
     *
     * @param int $resourceId
     * @return mixed
     * @throws MoodleException
     */
    public function viewResourceEvent(int $resourceId)
    {
        $resource = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=mod_resource_view_resource&moodlewsrestformat=json",
                [
                    'resourceid' => $resourceId,
                ]
            )
            ->json();

        if (isset($resource['exception'])) {
            throw new MoodleException($resource['message']);
        }

        return $resource['status'];
    }

    public function calendarMonthlyView(int $year, int $month, int $courseId = 0)
    {
        $calendar = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_calendar_get_calendar_monthly_view",
                [
                    'courseid' => $courseId,
                    'year' => $year,
                    'month' => $month,
                ]
            )
            ->json();

        return new CalendarMonthly($calendar);
    }
}
