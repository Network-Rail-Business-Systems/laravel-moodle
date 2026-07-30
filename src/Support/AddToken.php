<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;

class AddToken
{
    public function __construct()
    {
        if (session()->has('moodle-token') === false) {
            throw new MoodleTokenMissingException();
        }
    }

    public function toImages(string $content): Stringable
    {
        return Str::of($content)->replace(
            ['.png', '.PNG', '.jpg', '.JPG'],
            [
                '.png?token='.session('moodle-token'),
                '.PNG?token='.session('moodle-token'),
                '.jpg?token='.session('moodle-token'),
                '.JPG?token='.session('moodle-token'),
            ]
        );
    }

    public function toUrl(string $url): string
    {
        return $url.'?token='.session('moodle-token');
    }
}
