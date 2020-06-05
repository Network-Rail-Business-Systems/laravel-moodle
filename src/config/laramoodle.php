<?php

return [
    /**
     * The base url of your moodle installation,
     * such as https://www.example.com or https://www.example.com/moodle if in a sub folder
     */
    'base_url' => env('MOODLE_BASE_URL'),

    /**
     * A token for an admin user that can search users
     */
    'admin_token' => env('MOODLE_ADMIN_TOKEN'),

    /**
     * The login attribute to use. Default is email, but can be overwritten, for example, username
     */
    'login_attribute' => env('MOODLE_LOGIN_ATTRIBUTE', 'email'),

    /**
     * User attributes to sync to the user model
     * db field name => moodle field name
     */
    'sync_attributes' => [
        'name' => 'fullname',
        'email' => 'email'
    ],

    /**
     * The user model in your app
     */
    'user_model' => App\User::class,

    /**
     * The default ID of student.
     * Overwrite in the env file if you would like a different default role id when a user is enrolled onto a course
     */
    'student_role_id' => env('MOODLE_STUDENT_ROLE_ID', 5),
];
