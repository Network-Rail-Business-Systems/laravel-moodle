<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Support;

use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;

class MoodleToken
{
    public static function get(): string
    {
        $token = config('laravel-moodle.admin_token');

        if (empty($token) === true) {
            throw new MoodleTokenMissingException(
                'The Moodle admin token is not configured.'
            );
        }

        return $token;
    }
}