<?php

namespace NRBusinessSystems\LaraMoodle;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseContent;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseModuleById;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CoursePages;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\CourseSearch;
use NRBusinessSystems\LaraMoodle\DataTransferObjects\Module;
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
    public function getCourseById(int $id)
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
     * @param string $term
     * @param int $page
     * @param int $perPage
     * @return CourseSearch
     */
    public function searchCourses(string $term, int $page = 0, int $perPage = 15)
    {
        $courses = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_search_courses",
                [
                    'criterianame' => 'search',
                    'criteariavalue' => $term,
                    'page' => $page,
                    'perpage' => $perPage
                ]
            )
            ->json();

        return new CourseSearch($courses);
    }

    /**
     * Get the contents for a course
     *
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function getCourseContentsById(int $id)
    {
        $courseContents = $this->http->get(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=core_course_get_contents&courseid={$id}"
            )
            ->json();

        return collect($courseContents)->map(function($content) {
            return new CourseContent($content);
        });
    }

    /**
     * Get a course module by the module id
     *
     * @param $id
     * @return CourseModuleById
     */
    public function getCourseModuleById($id)
    {
        $module = $this->http
            ->get(
                "?wstoken=3a52dd83512957fc724122bf4853a2a8&moodlewsrestformat=json&wsfunction=core_course_get_course_module&cmid={$id}"
            )->json();

        return new CourseModuleById($module);
    }

    public function getPagesForCourse($id)
    {
        $pages = $this->http->asForm()
            ->post(
                "?wstoken={$this->token}&moodlewsrestformat=json&wsfunction=mod_page_get_pages_by_courses",
                [
                    'courseids' => [$id]
                ]
            )
            ->json();

        return new CoursePages($pages);
    }
}
