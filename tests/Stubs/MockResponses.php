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
            ],
            'warnings' => []
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

    public static function coursePages()
    {
        return [
            'pages' => [
                [
                    "id"=>  1,
                    "coursemodule"=>  2,
                    "course"=>  2,
                    "name"=>  "My First Page",
                    "intro"=>  "",
                    "introformat"=>  1,
                    "introfiles"=>  [],
                    "content"=>  "<p>The page content</p>",
                    "contentformat"=>  1,
                    "contentfiles"=>  [
                        [
                            "filename"=>  "Page Image.png",
                            "filepath"=>  "/",
                            "filesize"=>  11837,
                            "fileurl"=>  "http://moodle.test/webservice/pluginfile.php/47/mod_page/content/0/page%20image.png",
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
                ]
            ],
            'warnings' => []
        ];
    }

    public static function enrolledUsers()
    {
        return [
            [
                "id" => 3,
                "username" => "testuser",
                "firstname" => "Test",
                "lastname" => "User",
                "fullname" => "Test User",
                "email" => "test.user@fake.email",
                "department" => "",
                "firstaccess" => 1589799176,
                "lastaccess" => 1589872796,
                "lastcourseaccess" => 0,
                "description" => "",
                "descriptionformat" => 1,
                "profileimageurlsmall" => "http =>//moodle.test/theme/image.php/moove/core/1590132460/u/f2",
                "profileimageurl" => "http =>//moodle.test/theme/image.php/moove/core/1590132460/u/f1",
                "groups" => [],
                "roles" => [
                    [
                        "roleid" => 5,
                        "name" => "",
                        "shortname" => "student",
                        "sortorder" => 0
                    ]
                ],
                "preferences" => [],
                "enrolledcourses" => [
                    [
                        "id" => 2,
                        "fullname" => "My First Course",
                        "shortname" => "Short Course"
                    ]
                ]
            ]
        ];
    }

    public static function courseActivityStatuses()
    {
        return [
            'statuses' => [
                [
                    "cmid" => 2,
                    "modname" => "page",
                    "instance" => 1,
                    "state" => 1,
                    "timecompleted" => 1589877760,
                    "tracking" => 2,
                    "overrideby" => null,
                    "valueused" => false
                ]
            ],
            'warnings' => []
        ];
    }

    public static function badges()
    {
        return [
            "badges" => [
                [
                    "id" => 2,
                    "name" => "BBS Complete",
                    "description" => "Completed My First Course",
                    "timecreated" => 1591350979,
                    "timemodified" => 1591351005,
                    "usercreated" => 2,
                    "usermodified" => 2,
                    "issuername" => "Business Systems",
                    "issuerurl" => "http =>//moodle.test",
                    "issuercontact" => "",
                    "expiredate" => null,
                    "expireperiod" => null,
                    "type" => 2,
                    "courseid" => 2,
                    "message" => "<p>You have been awarded the badge \"%badgename%\"!</p>\n<p>More information about this badge can be found on the %badgelink% badge information page.</p>\n<p>You can manage and download the badge from your <a href=\"http =>//moodle.test/badges/mybadges.php\">Manage badges</a> page.</p>",
                    "messagesubject" => "Congratulations! You just earned a badge!",
                    "attachment" => 1,
                    "notification" => 0,
                    "nextcron" => null,
                    "status" => 3,
                    "issuedid" => 2,
                    "uniquehash" => "7f3fcbbd0c5842e3ac0e9fc756a5ab4bf4719cac",
                    "dateissued" => 1591351005,
                    "dateexpire" => null,
                    "visible" => 1,
                    "email" => "test.user@fake.email",
                    "version" => "",
                    "language" => "en",
                    "imageauthorname" => "",
                    "imageauthoremail" => "",
                    "imageauthorurl" => "",
                    "imagecaption" => "",
                    "badgeurl" => "http =>//moodle.test/webservice/pluginfile.php/45/badges/badgeimage/2/f1",
                    "alignment" => [],
                    "relatedbadges" => []
                ]
            ],
            "warnings" => []
        ];
    }

    public static function getScorms()
    {
        return [
            "scorms" => [
                [
                    "id" => 1,
                    "coursemodule" => 17,
                    "course" => 3,
                    "name" => "Example scorm",
                    "intro" => "",
                    "introformat" => 1,
                    "introfiles" => [],
                    "packagesize" => 8536684,
                    "packageurl" => "http =>//moodle.test/webservice/pluginfile.php/64/mod_scorm/package/0/EZMax%20Inventory%20Traing%20%5BTest%20Demo%20V2%5D.zip",
                    "version" => "SCORM_1.2",
                    "maxgrade" => 100,
                    "grademethod" => 1,
                    "whatgrade" => 0,
                    "maxattempt" => 0,
                    "forcecompleted" => false,
                    "forcenewattempt" => 0,
                    "lastattemptlock" => false,
                    "displayattemptstatus" => 1,
                    "displaycoursestructure" => false,
                    "sha1hash" => "538c25803bec0394bbbce10be5288efa126c7e59",
                    "md5hash" => "",
                    "revision" => 1,
                    "launch" => 2,
                    "skipview" => 0,
                    "hidebrowse" => false,
                    "hidetoc" => 0,
                    "nav" => 1,
                    "navpositionleft" => -100,
                    "navpositiontop" => -100,
                    "auto" => false,
                    "popup" => 1,
                    "width" => 100,
                    "height" => 500,
                    "timeopen" => 0,
                    "timeclose" => 0,
                    "displayactivityname" => true,
                    "scormtype" => "local",
                    "reference" => "EZMax Inventory Traing [Test Demo V2].zip",
                    "protectpackagedownloads" => false,
                    "updatefreq" => 0,
                    "options" => "scrollbars=0,directories=0,location=0,menubar=0,toolbar=0,status=0",
                    "completionstatusrequired" => null,
                    "completionscorerequired" => null,
                    "completionstatusallscos" => 0,
                    "autocommit" => false,
                    "timemodified" => 1589983865,
                    "section" => 1,
                    "visible" => true,
                    "groupmode" => 0,
                    "groupingid" => 0
                ]
            ],
            "warnings" => []
        ];
    }

    public static function categories()
    {
        return [
            [
                "id" => 1,
                "name" => "Miscellaneous",
                "idnumber" => null,
                "description" => "",
                "descriptionformat" => 1,
                "parent" => 0,
                "sortorder" => 10000,
                "coursecount" => 1,
                "visible" => 1,
                "visibleold" => 1,
                "timemodified" => 1589550212,
                "depth" => 1,
                "path" => "/1",
                "theme" => ""
            ]
        ];
    }
}
