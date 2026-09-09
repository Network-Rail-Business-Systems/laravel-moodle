<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Middleware\SyncMoodleUser;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;

class ServiceProvider extends BaseServiceProvider
{
    const string EMULATOR_URL = 'http://moodle.test';

    public function register(): void
    {
        parent::register();

        app('router')->aliasMiddleware('laravel-moodle', SyncMoodleUser::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/laravel-moodle.php' => config_path('laravel-moodle.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/config/laravel-moodle.php', 'laravel-moodle');

        if (config('laravel-moodle.emulator_enabled') === true) {
            self::startEmulator();
        }
    }

    public static function startEmulator(): void
    {
        config()->set('laravel-moodle.base_url', self::EMULATOR_URL);

        /** @var class-string<Model> $modelClass */
        $modelClass = config('laravel-moodle.user_model');

        $user = $modelClass::query()->firstOrCreate([
            'username' => 'gandalf',
        ], [
            'azure_id' => '#1234567890!',
            'business_area' => 'Isengard',
            'email' => 'gandalf.stormcrow@example.com',
            'location' => 'Rohan',
            'moodle_id' => 123,
            'name' => 'Gandalf Stormcrow',
            'title' => 'Wizard',
        ]);

        Http::fake(function (Request $request) use ($user) {
            $function = $request->data()['wsfunction'] ?? null;

            return match ($function) {
                'core_user_get_users' => Http::response([
                    'users' => [
                        [
                            'city' => $user->location,
                            'department' => $user->business_area,
                            'description' => $user->title,
                            'email' => $user->email,
                            'firstname' => $user->first_name,
                            'fullname' => $user->name,
                            'id' => $user->moodle_id,
                            'lastname' => $user->last_name,
                            'username' => $user->username,
                        ],
                    ],
                ]),

                'core_user_create_users' => Http::response([
                    [
                        'id' => 123,
                        'username' => $request->data()['users'][0]['username']
                            ?? 'gandalf',
                    ],
                ]),

                'core_user_update_users' => Http::response([]),

                'core_course_get_courses_by_field' => Http::response(
                    MockResponses::getCourses()
                ),

                'core_course_get_contents' => Http::response(
                    MockResponses::getCourseContents()
                ),

                'core_course_search_courses' => Http::response(
                    MockResponses::searchCourses()
                ),

                'core_course_get_categories' => Http::response(
                    MockResponses::categories()
                ),

                'core_enrol_get_enrolled_users' => Http::response(
                    MockResponses::enrolledUsers()
                ),

                'core_enrol_get_users_courses' => Http::response([
                    [
                        'id' => 1,
                        'fullname' => 'My First Course',
                        'displayname' => 'My First Course',
                        'shortname' => 'Intro Course',
                    ],
                ]),

                'core_completion_get_course_completion_status' => Http::response(
                    MockResponses::courseCompletion()
                ),

                'core_completion_get_activities_completion_status' => Http::response(
                    MockResponses::courseCompletion()
                ),

                'core_calendar_get_calendar_monthly_view' => Http::response(
                    MockResponses::calendarResponse()
                ),

                'mod_page_get_pages_by_courses' => Http::response(
                    MockResponses::coursePages()
                ),

                'mod_page_view_page' => Http::response([
                    'status' => true,
                    'warnings' => [],
                ]),

                'mod_resource_get_resources_by_courses' => Http::response(
                    MockResponses::getResources()
                ),

                'mod_resource_view_resource' => Http::response([
                    'status' => true,
                    'warnings' => [],
                ]),

                'mod_scorm_get_scorms_by_courses' => Http::response(
                    MockResponses::getScorms()
                ),

                'mod_scorm_get_scorm_scoes' => Http::response(
                    MockResponses::getScoes()
                ),

                'mod_assign_get_assignments' => Http::response(
                    MockResponses::courseAssignments()
                ),

                'mod_assign_get_submission_status' => Http::response(
                    MockResponses::assessmentStatus()
                ),

                'mod_assign_save_submission' => Http::response([]),

                'gradereport_overview_get_course_grades' => Http::response(
                    MockResponses::getGrades()
                ),

                'enrol_self_enrol_user' => Http::response(
                    MockResponses::selfEnrol()
                ),

                'enrol_manual_enrol_users' => Http::response(
                    MockResponses::manualEnrol()
                ),

                'enrol_manual_unenrol_users' => Http::response([]),

                default => Http::response([
                    'exception' => 'moodle_exception',
                    'errorcode' => 'unsupported_emulator_function',
                    'message' => sprintf(
                        'No emulator response exists for Moodle function [%s].',
                        $function ?? 'missing wsfunction'
                    ),
                ], 500),
            };
        });
    }
}
