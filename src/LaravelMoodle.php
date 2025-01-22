<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use GuzzleHttp\Profiling\Debugbar\Profiler;
use GuzzleHttp\Profiling\Middleware;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CalendarMonthly;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Category;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Course;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseActivityStatuses;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseCompletion;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseContent;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseEnrolledUser;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseModuleById;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CoursePages;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseSearch;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetBadges;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetCourseAssignments;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetCoursesByField;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetGrades;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetResources;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetScoes;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\getScorms;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetUsers;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Grade;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\SelfEnrol;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\SubmissionStatus;
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Warning;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleException;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;

class LaravelMoodle
{
    private PendingRequest $http;

    private string $token;

    public function __construct()
    {
        if (session()->has('moodle-token') === false) {
            throw new MoodleTokenMissingException();
        }

        $this->token = session('moodle-token');

        $this->http = Http::withOptions([
            'base_uri' => config('laravel-moodle.base_url'),
        ]);

        if (config('laravel-moodle.debug')) {
            $debugbar = App::make('debugbar');
            $this->http->withMiddleware(new Middleware(new Profiler($debugbar->getCollector('time'))));
        }
    }

    public function getCourses(string $term = '', string $field = ''): GetCoursesByField
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

    public function getCoursesByCategory(int $categoryId): GetCoursesByField
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

    public function getCourse(int $id): Course
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

        abort_if(empty($courses['courses']) === true, 404, 'Course not found');

        return new Course($courses['courses'][0]);
    }

    public function searchCourses(string $term, int $page = 0, int $perPage = 15, int $onlyEnrolled = 0): CourseSearch
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

        if (isset($courses['exception'])) {
            throw new MoodleException($courses['message']);
        }

        return new CourseSearch($courses);
    }

    public function getCourseContents(int $id): Collection
    {
        $courseContents = $this->http
            ->get(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_contents&courseid={$id}"
            )
            ->json();

        if (isset($courseContents['exception'])) {
            throw new MoodleException($courseContents['message']);
        }

        $contents = new Collection($courseContents);

        return $contents->map(function ($content) {
            return new CourseContent($content);
        });
    }

    public function getCourseModule(int $id): CourseModuleById
    {
        $module = $this->http
            ->get(
                "/webservice/rest/server.php?wstoken=3a52dd83512957fc724122bf4853a2a8&moodlewsrestformat=json&wsfunction=core_course_get_course_module&cmid={$id}"
            )
            ->json();

        return new CourseModuleById($module);
    }

    public function getCoursePages(int $courseId): CoursePages
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

    public function getCoursePage(int $courseId, int $moduleId): mixed
    {
        return collect($this->getCoursePages($courseId)->pages)
            ->filter(function ($value) use ($moduleId) {
                return $value->coursemodule == $moduleId;
            })
            ->first();
    }

    public function getCourseScorms(int $courseId): getScorms
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

    public function getCourseScorm(int $courseId, int $moduleId): mixed
    {
        return collect($this->getCourseScorms($courseId)->scorms)
            ->filter(function ($item) use ($moduleId) {
                return $item->coursemodule == $moduleId;
            })
            ->first();
    }

    public function getScormScoes(int $scormId): GetScoes
    {
        $scoes = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_scorm_get_scorm_scoes",
                [
                    'scormid' => $scormId,
                ]
            )
            ->json();

        return new GetScoes($scoes);
    }

    public function getCourseResources(int $courseId): GetResources
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

    public function getCourseResource(int $courseId, int $moduleId): mixed
    {
        return collect($this->getCourseResources($courseId)->resources)
            ->filter(function ($item) use ($moduleId) {
                return $item->coursemodule == $moduleId;
            })
            ->first();
    }

    public function getCourseCompletion(int $userId, int $courseId): CourseCompletion
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

    public function getCourseActivitiesCompletion(int $userId, int $courseId): CourseActivityStatuses
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

    public function getCourseAssignments(int $courseId): GetCourseAssignments
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

    public function getCourseAssignment(int $courseId, int $moduleId): mixed
    {
        $assignments = new Collection($this->getCourseAssignments($courseId)->courses[0]->assignments);

        return $assignments
            ->filter(function ($item) use ($moduleId) {
                return $item->cmid == $moduleId;
            })
            ->first();
    }

    public function getAssignmentSubmissionStatus(int $assignmentId, int $userId = 0): SubmissionStatus
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

    public function saveCourseAssignment(int $assignmentId, string $content = '', int $format = 1, int $itemId = 1): bool|Collection
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
            $assignments = new Collection($assignment);
            return $assignments->map(function ($warning) {
                return new Warning($warning);
            });
        }

        return true;
    }

    public function getUserGrades(int $userId = 0): GetGrades
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

    public function getCourseGrade(int $courseId, int $userId = 0): mixed
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

    public function searchUsers(string $searchTerm, string $field = 'username'): GetUsers
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

    public function enrolUserOnCourse(int $userId, int $courseId, ?int $roleId = null): bool
    {
        $enrol = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=enrol_manual_enrol_users&moodlewsrestformat=json",
                [
                    'enrolments' => [
                        [
                            'roleid' => $roleId ?? config('laravel-moodle.student_role_id'),
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

    public function selfEnrolOnCourse(int $courseId, string $enrollmentKey = '', int $instanceId = 0): SelfEnrol
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

    public function getEnrolledUsersForCourse(int $courseId): Collection
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

        if (isset($enrolledUsers['exception'])) {
            throw new MoodleException($enrolledUsers['message']);
        }

        $users = new Collection($enrolledUsers);

        return $users->map(function ($user) {
            return new CourseEnrolledUser($user);
        });
    }

    public function unenrolUserOnCourse(int $userId, int $courseId, ?int $roleId = null): bool
    {
        $unenrol = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=enrol_manual_unenrol_users&moodlewsrestformat=json",
                [
                    'enrolments' => [
                        [
                            'roleid' => $roleId ?? config('laravel-moodle.student_role_id'),
                            'userid' => $userId,
                            'courseid' => $courseId,
                        ],
                    ],
                ]
            )
            ->json();

        if (isset($unenrol['exception'])) {
            throw new MoodleException($unenrol['message']);
        }

        return true;
    }

    public function getBadges(int $userId = 0, int $courseId = 0, string $search = ''): GetBadges
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

    public function getCategories(): Collection
    {
        $categories = $this->http
            ->asForm()
            ->get(
                "/webservice/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_categories&moodlewsrestformat=json"
            )
            ->json();

        $category = new Collection($categories);

        return $category->map(function ($category) {
            return new Category($category);
        });
    }

    public function searchCategories(string $searchTerm, string $field = 'name'): Collection
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

        $category = new Collection($categories);
        return $category->map(function ($category) {
            return new Category($category);
        });
    }

    public function viewPageEvent(int $pageId): bool
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

    public function viewResourceEvent(int $resourceId): mixed
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

    public function calendarMonthlyView(int $year, int $month, int $courseId = 0): CalendarMonthly
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
