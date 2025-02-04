<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Middleware\MoodleToken;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;

class ServiceProvider extends BaseServiceProvider
{
    const string EMULATOR_URL = 'http://moodle.test';

    public function register(): void
    {
        parent::register();

        app('router')->aliasMiddleware('laravel-moodle', MoodleToken::class);
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
            'address' => '123 Fake Street',
            'business_area' => 'Isengard',
            'email' => 'gandalf.stormcrow@example.com',
            'location' => 'Rohan',
            'moodle_id' => 123,
            'name' => 'Gandalf Stormcrow',
            'office' => 'Rooftop',
            'title' => 'Wizard',
        ]);

        Http::fake([
            '*login/token*' => [
                'token' => 'abc123',
            ],
            '*core_user_get_users*' => [
                'users' => [
                    [
                        'address' => $user->address,
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'fullname' => $user->name,
                        'id' => $user->moodle_id,
                        'institution' => $user->office,
                        'username' => $user->username,
                    ],
                ],
            ],
            '*core_course_get_courses_by_field*' => Http::response(
                MockResponses::getCourses(),
            ),
            '*core_course_get_contents*' => Http::response(
                MockResponses::getCourseContents(),
            ),
            '*core_course_search_courses*' => Http::response(
                MockResponses::searchCourses(),
            ),
            '*core_course_get_categories*' => Http::response(
                MockResponses::categories(),
            ),
            '*core_enrol_get_enrolled_users*' => Http::response(
                MockResponses::enrolledUsers(),
            ),
            '*core_completion_get_course_completion_status*' => Http::response(
                MockResponses::courseCompletion(),
            ),
            '*core_calendar_get_calendar_monthly_view*' => Http::response(
                MockResponses::calendarResponse(),
            ),
            '*mod_page_get_pages_by_courses*' => Http::response(
                MockResponses::coursePages(),
            ),
            '*mod_page_view_page*' => Http::response([
                'status' => true,
                'warnings' => [],
            ]),
            '*mod_scorm_get_scorms_by_courses*' => Http::response(
                MockResponses::getScorms(),
            ),
            '*mod_scorm_get_scorm_scoes*' => Http::response(
                MockResponses::getScoes(),
            ),
            '*mod_assign_get_assignments*' => Http::response(
                MockResponses::courseAssignments(),
            ),
            '*mod_assign_save_submission*' => Http::response([]),
            '*mod_resource_get_resources_by_courses*' => Http::response(
                MockResponses::getResources(),
            ),
            '*mod_resource_view_resource*' => Http::response([
                'status' => true,
                'warnings' => [],
            ]),
            '*mod_assign_get_submission_status*' => Http::response(
                MockResponses::assessmentStatus(),
            ),
            '*gradereport_overview_get_course_grades*' => Http::response(
                MockResponses::getGrades(),
            ),
            '*enrol_self_enrol_user*' => Http::response(
                MockResponses::selfEnrol(),
            ),
            '*enrol_manual_enrol_users*' => Http::response(
                MockResponses::manualEnrol(),
            ),
            '*enrol_manual_unenrol_users*' => Http::response([
                'status' => true,
                'warnings' => [],
            ]),
        ])->baseUrl(self::EMULATOR_URL);
    }
}
