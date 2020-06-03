<?php

namespace NRBusinessSystems\LaraMoodle;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseContent;
use NRBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Course;

class LaraMoodle
{
    private $http;
    private $token;

    public function __construct()
    {
        $this->http = Http::withOptions([
            'base_uri' => config('laramoodle.base_url')
        ]);

        if(!session()->has('moodle-token')) {
            throw new MoodleTokenMissingException();
        }

        $this->token = session('moodle-token');
    }

    /**
     * Get a collection course objects
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCourses()
    {
        $courses = $this->http->get(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses&moodlewsrestformat=json"
            )
            ->json();

        return collect($courses)->map(function($course) {
            return new Course($course);
        });
    }

    /**
     * Return a course object for the id
     *
     * @param $id
     * @return Course
     */
    public function getCourseById($id)
    {
        $course = $this->http->asForm()
            ->post(
                "/rest/server.php?wstoken={$this->token}&wsfunction=core_course_get_courses&moodlewsrestformat=json",
                [
                    'options' => [
                        'ids' => [$id]
                    ]
                ]
            )
            ->json();

        return new Course($course[0]);
    }

    /**
     * Get the contents for a course
     *
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function getCourseContentsById($id)
    {
        $courseContents = $this->http->get(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_contents&courseid={$id}"
            )
            ->json();

        return collect($courseContents)->map(function($content) {
            return new CourseContent($content);
        });
    }
}
