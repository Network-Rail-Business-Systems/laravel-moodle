<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Stubs;

class MockResponses
{
    public static function userSearch()
    {
        return [
            'users' => [
                0 => [
                    'id' => 2,
                    'username' => 'testuser',
                    'firstname' => 'Test',
                    'lastname' => 'User',
                    'fullname' => 'Test User',
                    'email' => 'test.user@fake.email',
                    'department' => 'My Department',
                    'firstaccess' => 1589550236,
                    'lastaccess' => 1591093732,
                    'auth' => 'manual',
                    'suspended' => false,
                    'confirmed' => true,
                    'lang' => 'en',
                    'theme' => '',
                    'timezone' => '99',
                    'mailformat' => 1,
                    'description' => '',
                    'descriptionformat' => 1,
                    'profileimageurlsmall' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f2',
                    'profileimageurl' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f1',
                ]
            ]
        ];
    }

    public static function loginSuccess()
    {
        return [
            'token' => 'ABC123'
        ];
    }

    public static function loginFailure()
    {
        return [
            'error' => 'Invalid login, please try again',
            'errorcode' => 'invalidlogin',
            'stacktrace' => '* line 105 of /login/token.php: moodle_exception thrown'
        ];
    }

    public static function getCourses()
    {
        return
            [
                [
                    "id"=> 2,
                    "shortname"=> "Intro Course",
                    "categoryid"=> 2,
                    "categorysortorder"=> 20001,
                    "fullname"=> "My First Course",
                    "displayname"=> "My First Course",
                    "idnumber"=> "",
                    "summary"=> "<p>This course is aimed at all staff</p>",
                    "summaryformat"=> 1,
                    "format"=> "topics",
                    "showgrades"=> 1,
                    "newsitems"=> 5,
                    "startdate"=> 1589929200,
                    "enddate"=> 1621465200,
                    "numsections"=> 7,
                    "maxbytes"=> 0,
                    "showreports"=> 0,
                    "visible"=> 1,
                    "hiddensections"=> 0,
                    "groupmode"=> 0,
                    "groupmodeforce"=> 0,
                    "defaultgroupingid"=> 0,
                    "timecreated"=> 1589873173,
                    "timemodified"=> 1589882661,
                    "enablecompletion"=> 1,
                    "completionnotify"=> 0,
                    "lang"=> "en",
                    "forcetheme"=> "",
                    "courseformatoptions"=> [
                        [
                            "name"=> "hiddensections",
                            "value"=> 0
                        ],
                        [
                            "name"=> "coursedisplay",
                            "value"=> 1
                        ]

                    ]
                ]
            ];
    }

    public static function getCourseContents()
    {
        return [
            [
                "id"=>1,
                "name"=> "General",
                "visible"=> 1,
                "summary"=> "<p>The summary for this course contents</p>",
                "summaryformat"=> 1,
                "section"=> 0,
                "hiddenbynumsections"=> 0,
                "uservisible"=> true,
                "modules"=> [
                    [
                        "id"=> 1,
                        "url"=> "http://moodle.test/mod/forum/view.php?id=1",
                        "name"=> "Announcements",
                        "instance"=> 1,
                        "visible"=> 1,
                        "uservisible"=> true,
                        "visibleoncoursepage"=> 1,
                        "modicon"=> "http://moodle.test/theme/image.php/moove/forum/1590132460/icon",
                        "modname"=> "forum",
                        "modplural"=> "Forums",
                        "availability"=> null,
                        "indent"=> 0,
                        "onclick"=> "",
                        "afterlink"=> null,
                        "customdata"=> "\"\"",
                        "noviewlink"=> false,
                        "completion"=> 0
                    ]
                ]
            ]
        ];
    }
}
