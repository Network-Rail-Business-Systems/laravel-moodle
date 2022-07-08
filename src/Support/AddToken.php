<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Support;

use Illuminate\Support\Str;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;

class AddToken
{
    public function __construct()
    {
        if (!session()->has('moodle-token')) {
            throw new MoodleTokenMissingException();
        }
    }

    /**
     * @param $content
     * @return \Illuminate\Support\Stringable
     */
    public function toImages($content)
    {
        return Str::of($content)->replace(
            ['.png', '.PNG', '.jpg', '.JPG'],
            [
                '.png?token=' . session('moodle-token'),
                '.PNG?token=' . session('moodle-token'),
                '.jpg?token=' . session('moodle-token'),
                '.JPG?token=' . session('moodle-token'),
            ]
        );
    }

    /**
     * @param $url
     * @return string
     */
    public function toUrl($url)
    {
        return $url . '?token=' . session('moodle-token');
    }
}
