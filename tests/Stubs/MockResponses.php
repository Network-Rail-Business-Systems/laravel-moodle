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

    public static function searchCourses()
    {
        return [
            "total" => 1,
            "courses" => [
                [
                    "id" => 2,
                    "fullname" => "My First Course",
                    "displayname" => "My First Course",
                    "shortname" => "Intro Course",
                    "categoryid" => 2,
                    "categoryname" => "Course Category",
                    "sortorder" => 20001,
                    "summary" => "<p>This course is aimed at all staff</p>",
                    "summaryformat" => 1,
                    "summaryfiles" => [],
                    "overviewfiles" => [
                        [
                            "filename" => "4251.png",
                            "filepath" => "/",
                            "filesize" => 37306,
                            "fileurl" => "http=> //moodle.test/webservice/pluginfile.php/45/course/overviewfiles/4251.png",
                            "timemodified" => 1589882661,
                            "mimetype" => "image/png"
                        ]
                    ],
                    "contacts" => [],
                    "enrollmentmethods" => [
                        "manual",
                        "self"
                    ]
                ]
            ],
            "warnings" => []
        ];
    }

    public static function getCourseModule()
    {
        return [
            "cm" =>  [
                "id"=>  11,
                "course"=>  2,
                "module"=>  3,
                "name"=>  "My first module",
                "modname"=>  "book",
                "instance"=>  2,
                "section"=>  3,
                "sectionnum"=>  2,
                "groupmode"=>  0,
                "groupingid"=>  0,
                "completion"=>  2,
                "idnumber"=>  "",
                "added"=>  1589878397,
                "score"=>  0,
                "indent"=>  0,
                "visible"=>  1,
                "visibleoncoursepage"=>  1,
                "visibleold"=>  1,
                "completiongradeitemnumber"=>  null,
                "completionview"=>  1,
                "completionexpected"=>  0,
                "showdescription"=>  1,
                "availability"=>  null
            ],
            "warnings"=>  []
        ];
    }

    public static function getCoursePages()
    {
        return [
            'pages' => [
                "id"=>  1,
                "coursemodule"=>  2,
                "course"=>  2,
                "name"=>  "With a Windows login",
                "intro"=>  "",
                "introformat"=>  1,
                "introfiles"=>  [],
                "content"=>  "<p>The Business Briefing System supports a single sign-on solution, should you have a Network Rail windows login please use your Windows username and password and select Login.&nbsp;</p><p><i>Please note, if you enter your password incorrectly three times you will be locked out of your <b>Windows account</b> and will need to call the IT Helpdesk on 01270 721600 to reset your password.&nbsp;</i></p><p><i><img src=\"http=> //moodle.test/webservice/pluginfile.php/47/mod_page/content/1/Windows%20login.png\" alt=\"windows login screen\" width=\"766\" height=\"346\" class=\"img-responsive atto_image_button_text-bottom\"><br></i></p>",
                "contentformat"=>  1,
                "contentfiles"=>  [
                    [
                        "filename"=>  "Windows login.png",
                        "filepath"=>  "/",
                        "filesize"=>  11837,
                        "fileurl"=>  "http://moodle.test/webservice/pluginfile.php/47/mod_page/content/0/Windows%20login.png",
                        "timemodified"=>  1589874079,
                        "mimetype"=>  "image/png",
                        "isexternalfile"=>  false
                    ]
                ],
                "legacyfiles"=>  0,
                "legacyfileslast"=>  null,
                "display"=>  5,
                "displayoptions"=>  "a=> 3=> {s=> 12=> \"printheading\";s=> 1=> \"1\";s=> 10=> \"printintro\";s=> 1=> \"0\";s=> 17=> \"printlastmodified\";s=> 1=> \"1\";}",
                "revision"=>  1,
                "timemodified"=>  1589874079,
                "section"=>  1,
                "visible"=>  1,
                "groupmode"=>  0,
                "groupingid"=>  0
            ],
            'warnings' => []
        ];
    }

}
