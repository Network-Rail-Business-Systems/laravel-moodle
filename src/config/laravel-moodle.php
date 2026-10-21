<?php

return [
    /**
     * The base url of your moodle installation,
     * such as https://www.example.com or https://www.example.com/moodle if in a sub folder
     */
    'base_url' => env('MOODLE_BASE_URL'),

    /**
     * The Moodle web service token used by TMS to make Moodle requests.
     */
    'admin_token' => env('MOODLE_ADMIN_TOKEN'),

    /**
     * User attributes to sync to the user model
     * Moodle field name => Laravel field name
     */
    'sync_attributes' => [
        'city' => 'location',
        'department' => 'business_area',
        'description' => 'title',
        'email' => 'email',
        'firstname' => 'first_name',
        'lastname' => 'last_name',
    ],

    /**
     * The user model in your app
     */
    'user_model' => \App\Models\User::class,

    /**
     * The default ID of student.
     * Overwrite in the env file if you would like a different default role id when a user is enrolled onto a course
     */
    'student_role_id' => env('MOODLE_STUDENT_ROLE_ID', 5),

    /**
     * Whether to debug. Requires the Laravel Debugbar to be installed
     * Requests will appear in the debugbar Timeline
     */
    'debug' => env('DEBUGBAR_ENABLED', null),

    // Whether to use the Moodle Emulator
    'emulator_enabled' => env('MOODLE_EMULATOR_ENABLED', false),
];
