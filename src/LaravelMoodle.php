<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use GuzzleHttp\Profiling\Debugbar\Profiler;
use GuzzleHttp\Profiling\Middleware;
use Illuminate\Database\Eloquent\Model;
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
use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\GetScorms;
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

    private string $adminToken;

    public function __construct()
    {
        $token = config('laravel-moodle.admin_token');

        if (blank($token) === true) {
            throw new MoodleTokenMissingException(
                'The Moodle admin token is not configured.'
            );
        }

        $this->adminToken = $token;

        $this->http = Http::withOptions([
            'base_uri' => config('laravel-moodle.base_url'),
        ]);

        if (config('laravel-moodle.debug')) {
            $debugbar = App::make('debugbar');

            $this->http->withMiddleware(
                new Middleware(
                    new Profiler($debugbar->getCollector('time'))
                )
            );
        }
    }

    private function callMoodle(
        string $function,
        array $parameters = []
    ): array {
        $response = $this->http
            ->asForm()
            ->post('/webservice/rest/server.php', array_merge([
                'wstoken' => $this->adminToken,
                'moodlewsrestformat' => 'json',
                'wsfunction' => $function,
            ], $parameters))
            ->json();

        if (isset($response['exception']) === true) {
            throw new MoodleException(
                $response['message']
                ?? 'Moodle request failed: '.$response->body()
            );
        }

        return $response;
    }

    public function getCourses(string $term = '', string $field = ''): GetCoursesByField
    {
        $courses = $this->callMoodle(
            'core_course_get_courses_by_field',
            [
                'field' => $field,
                'value' => $term,
            ]
        );

        $courses['courses'] = array_map(
            static function (array $course): array {
                $course['customfields'] = $course['customfields'] ?? [];

                return $course;
            },
            $courses['courses'] ?? []
        );

        return new GetCoursesByField($courses);
    }

    public function getCoursesByCategory(int $categoryId): GetCoursesByField
    {
        $courses = $this->callMoodle(
            'core_course_get_courses_by_field',
            [
                'field' => 'category',
                'value' => $categoryId,
            ]
        );

        return new GetCoursesByField($courses);
    }

    public function getCourse(int $id): Course
    {
        $courses = $this->callMoodle(
            'core_course_get_courses_by_field',
            [
                'field' => 'id',
                'value' => $id,
            ]
        );

        abort_if(empty($courses['courses']) === true, 404, 'Course not found');

        $course = $courses['courses'][0];

        $course['customfields'] = $course['customfields'] ?? [];

        return new Course($course);
    }

    public function searchCourses(string $term, int $page = 0, int $perPage = 15, int $onlyEnrolled = 0): CourseSearch
    {
        $courses = $this->callMoodle(
            'core_course_search_courses',
            [
                'criterianame' => 'search',
                'criteriavalue' => $term,
                'page' => $page,
                'perpage' => $perPage,
                'limittoenrolled' => $onlyEnrolled,
            ]
        );

        if (isset($courses['exception'])) {
            throw new MoodleException($courses['message']);
        }

        return new CourseSearch($courses);
    }

    public function getCourseContents(int $id): Collection
    {
        $courseContents = $this->callMoodle(
            'core_course_get_contents',
            [
                'courseid' => $id,
            ]
        );

        $contents = new Collection($courseContents);

        return $contents->map(function ($content) {
            return new CourseContent($content);
        });
    }

    public function getCourseModule(int $id): CourseModuleById
    {
        $module = $this->callMoodle(
            'core_course_get_course_module',
            [
                'cmid' => $id,
            ]
        );

        return new CourseModuleById($module);
    }

    public function getCoursePages(int $courseId): CoursePages
    {
        $pages = $this->callMoodle(
            'mod_page_get_pages_by_courses',
            [
                'courseids' => [$courseId],
            ]
        );

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

    public function getCourseScorms(int $courseId): GetScorms
    {
        $scorms = $this->callMoodle(
            'mod_scorm_get_scorms_by_courses',
            [
                'courseids' => [$courseId],
            ]
        );

        return new GetScorms($scorms);
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
        $scoes = $this->callMoodle(
            'mod_scorm_get_scorm_scoes',
            [
                'scormid' => $scormId,
            ]
        );

        return new GetScoes($scoes);
    }

    public function getCourseResources(int $courseId): GetResources
    {
        $resources = $this->callMoodle(
            'mod_resource_get_resources_by_courses',
            [
                'courseids' => [$courseId],
            ]
        );

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
        $completion = $this->callMoodle(
            'core_completion_get_course_completion_status',
            [
                'courseid' => $courseId,
                'userid' => $userId,
            ]
        );

        return new CourseCompletion($completion);
    }

    public function getCourseActivitiesCompletion(int $userId, int $courseId): CourseActivityStatuses
    {
        $completion = $this->callMoodle(
            'core_completion_get_activities_completion_status',
            [
                'courseid' => $courseId,
                'userid' => $userId,
            ]
        );

        return new CourseActivityStatuses($completion);
    }

    public function getCourseAssignments(int $courseId): GetCourseAssignments
    {
        $assignments = $this->callMoodle(
            'mod_assign_get_assignments',
            [
                'courseids' => [$courseId],
            ]
        );

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
        $submissionStatus = $this->callMoodle(
            'mod_assign_get_submission_status',
            [
                'assignid' => $assignmentId,
                'userid' => $userId,
            ]
        );

        return new SubmissionStatus($submissionStatus);
    }

    public function saveCourseAssignment(int $assignmentId, string $content = '', int $format = 1, int $itemId = 1): bool|Collection
    {
        $assignment = $this->callMoodle(
            'mod_assign_save_submission',
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
        );

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
        $grades = $this->callMoodle(
            'gradereport_overview_get_course_grades',
            [
                'userid' => $userId,
            ]
        );

        return new GetGrades($grades);
    }

    public function getCourseGrade(int $courseId, int $userId = 0): mixed
    {
        $grades = $this->getUserGrades($userId)->grades ?? [];

        return collect($grades)
            ->firstWhere('courseid', $courseId)
            ?? new Grade([
                'grade' => null,
                'courseid' => $courseId,
                'rawgrade' => null,
            ]);
    }

    public function enrolUserOnCourse(int $userId, int $courseId, ?int $roleId = null): bool
    {
        $this->callMoodle(
            'enrol_manual_enrol_users',
            [
                'enrolments' => [
                    [
                        'roleid' => $roleId ?? config('laravel-moodle.student_role_id'),
                        'userid' => $userId,
                        'courseid' => $courseId,
                    ],
                ],
            ]
        );

        return true;
    }

    public function selfEnrolOnCourse(int $courseId, string $enrollmentKey = '', int $instanceId = 0): SelfEnrol
    {
        $enrol = $this->callMoodle(
            'enrol_self_enrol_user',
            [
                'courseid' => $courseId,
                'password' => $enrollmentKey,
                'instanceid' => $instanceId,
            ]
        );

        return new SelfEnrol($enrol);
    }

    public function getEnrolledUsersForCourse(int $courseId): Collection
    {
        $enrolledUsers = $this->callMoodle(
            'core_enrol_get_enrolled_users',
            [
                'courseid' => $courseId,
            ]
        );

        $users = new Collection($enrolledUsers);

        return $users->map(function ($user) {
            return new CourseEnrolledUser($user);
        });
    }

    public function unenrolUserOnCourse(int $userId, int $courseId, ?int $roleId = null): bool
    {
        $this->callMoodle(
            'enrol_manual_unenrol_users',
            [
                'enrolments' => [
                    [
                        'roleid' => $roleId ?? config('laravel-moodle.student_role_id'),
                        'userid' => $userId,
                        'courseid' => $courseId,
                    ],
                ],
            ]
        );

        return true;
    }

    public function getBadges(int $userId = 0, int $courseId = 0, string $search = ''): GetBadges
    {
        $badges = $this->callMoodle(
            'core_badges_get_user_badges',
            [
                'userid' => $userId,
                'courseid' => $courseId,
                'search' => $search,
            ]
        );

        return new GetBadges($badges);
    }

    public function getCategories(): Collection
    {
        $categories = $this->callMoodle('core_course_get_categories');

        $categories = new Collection($categories);

        return $categories->map(function ($category) {
            return new Category($category);
        });
    }

    public function searchCategories(string $searchTerm, string $field = 'name'): Collection
    {
        $categories = $this->callMoodle(
            'core_course_get_categories',
            [
                'criteria' => [
                    [
                        'key' => $field,
                        'value' => $searchTerm,
                    ],
                ],
            ]
        );

        $categories = new Collection($categories);

        return $categories->map(function ($category) {
            return new Category($category);
        });
    }

    public function viewPageEvent(int $pageId): bool
    {
        $page = $this->callMoodle(
            'mod_page_view_page',
            [
                'pageid' => $pageId,
            ]
        );

        return $page['status'];
    }

    public function viewResourceEvent(int $resourceId): mixed
    {
        $resource = $this->callMoodle(
            'mod_resource_view_resource',
            [
                'resourceid' => $resourceId,
            ]
        );

        return $resource['status'];
    }

    public function calendarMonthlyView(int $year, int $month, int $courseId = 0): CalendarMonthly
    {
        $calendar = $this->callMoodle(
            'core_calendar_get_calendar_monthly_view',
            [
                'courseid' => $courseId,
                'year' => $year,
                'month' => $month,
            ]
        );

        return new CalendarMonthly($calendar);
    }

    public function getUserCourses(int $moodleUserId): Collection
    {
        $response = $this->callMoodle(
            'core_enrol_get_users_courses',
            [
                'userid' => $moodleUserId,
            ]
        );

        return collect($response);
    }

    // User functions
    public function syncUser(
        Model $user,
        string $userKey = 'email',
        ?string $moodleKey = 'email'
    ): int {
        $moodleUser = $this->searchUsers(
            $user->{$userKey},
            $moodleKey
        )->users[0] ?? null;

        if ($moodleUser === null) {
            $moodleUserId = $this->createMoodleUser($user);
        } else {
            $moodleUserId = $moodleUser->id;

            $this->updateMoodleUser(
                $moodleUserId,
                $user
            );
        }

        $user->moodle_id = $moodleUserId;
        $user->save();

        return $moodleUserId;
    }

    public function searchUsers(string $searchTerm, string $field = 'username'): GetUsers
    {
        $users = $this->callMoodle(
            'core_user_get_users',
            [
                'criteria' => [
                    [
                        'key' => $field,
                        'value' => $searchTerm,
                    ],
                ],
            ]
        );

        return new GetUsers($users);
    }

    private function createMoodleUser(Model $user): int
    {
        $response = $this->callMoodle(
            'core_user_create_users',
            [
                'users' => [
                    [
                        'auth' => 'manual',
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'firstname' => $user->first_name,
                        'lastname' => $user->last_name,
                        'password' => 'A1!' . bin2hex(random_bytes(8)),
                        'username' => strtolower($user->username),
                    ],
                ],
            ]
        );

        if (isset($response[0]['id']) === false) {
            throw new MoodleException(
                $response['message'] ?? 'Moodle did not return a user ID.'
            );
        }

        return (int) $response[0]['id'];
    }

    private function updateMoodleUser(
        int $moodleUserId,
        Model $user
    ): void {
        $this->callMoodle(
            'core_user_update_users',
            [
                'users' => [
                    [
                        'id' => $moodleUserId,
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'firstname' => $user->first_name,
                        'lastname' => $user->last_name,
                        'username' => strtolower($user->username),
                    ],
                ],
            ]
        );
    }

    public function isUserEnrolled(int $moodleUserId, int $courseId): bool
    {
        return $this->getUserCourses($moodleUserId)
            ->contains(function (array $course) use ($courseId): bool {
                return (int) $course['id'] === $courseId;
            });
    }
}
