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
    'login_attribute' => env('MOODLE_LOGIN_ATTRIBUTE', 'email')
];
