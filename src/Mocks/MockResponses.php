<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Mocks;

use NetworkRailBusinessSystems\LaravelMoodle\Factories\Course;
use NetworkRailBusinessSystems\LaravelMoodle\Factories\CourseSearchCourse;

class MockResponses
{
    public static function userSearch(): array
    {
        return [
            'users' => [
                [
                    'address' => 'celery',
                    'auth' => 'manual',
                    'city' => 'carrot',
                    'confirmed' => true,
                    'department' => 'My Department',
                    'description' => '',
                    'descriptionformat' => 1,
                    'email' => 'test.user@fake.email',
                    'firstaccess' => 1589550236,
                    'firstname' => 'Test',
                    'fullname' => 'Test User',
                    'id' => 2,
                    'institution' => 'potato',
                    'lang' => 'en',
                    'lastaccess' => 1591093732,
                    'lastname' => 'User',
                    'mailformat' => 1,
                    'profileimageurl' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f1',
                    'profileimageurlsmall' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f2',
                    'suspended' => false,
                    'theme' => '',
                    'timezone' => '99',
                    'username' => 'testuser',
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function loginSuccess(): array
    {
        return [
            'token' => 'ABC123',
        ];
    }

    public static function loginFailure(): array
    {
        return [
            'error' => 'Invalid login, please try again',
            'errorcode' => 'invalidlogin',
            'stacktrace' => '* line 105 of /login/token.php: moodle_exception thrown',
        ];
    }

    public static function getCourses(): array
    {
        return [
            'courses' => [
                [
                    'id' => 2,
                    'fullname' => 'My First Course',
                    'shortname' => 'Intro Course',
                    'displayname' => 'My First Course',
                    'categoryid' => 2,
                    'categoryname' => 'Miscellaneous',
                    'sortorder' => 10001,
                    'summary' => '<p>This course is aimed at all staff</p>',
                    'summaryformat' => 1,
                    'summaryfiles' => [],
                    'overviewfiles' => [
                        [
                            'filename' => '4251.png',
                            'filepath' => '/',
                            'filesize' => 37306,
                            'fileurl' => 'http://moodle.test/webservice/pluginfile.php/45/course/overviewfiles/4251.png',
                            'timemodified' => 1589882661,
                            'mimetype' => 'image/png',
                        ],
                    ],
                    'contacts' => [],
                    'enrollmentmethods' => ['manual', 'self'],
                    'customfields' => [
                        [
                            'name' => 'Course Duration',
                            'shortname' => 'duration',
                            'type' => 'text',
                            'value' => '1 week',
                        ],
                        [
                            'name' => 'Course Type',
                            'shortname' => 'course_type',
                            'type' => 'text',
                            'value' => 'Online',
                        ],
                    ],
                    'idnumber' => '',
                    'format' => 'topics',
                    'showgrades' => 1,
                    'newsitems' => 5,
                    'startdate' => 1589929200,
                    'enddate' => 1621465200,
                    'maxbytes' => 0,
                    'showreports' => 0,
                    'visible' => 1,
                    'groupmode' => 0,
                    'groupmodeforce' => 0,
                    'defaultgroupingid' => 0,
                    'enablecompletion' => 1,
                    'completionnotify' => 0,
                    'lang' => 'en',
                    'theme' => '',
                    'marker' => 0,
                    'legacyfiles' => 0,
                    'calendartype' => '',
                    'timecreated' => 1589873173,
                    'timemodified' => 1589882661,
                    'requested' => 0,
                    'cacherev' => 1591624713,
                    'filters' => [],
                    'courseformatoptions' => [
                        [
                            'name' => 'hiddensections',
                            'value' => 0,
                        ],
                        [
                            'name' => 'coursedisplay',
                            'value' => 1,
                        ],
                    ],
                ],
                Course::make(),
                Course::make(),
            ],
            'warnings' => [],
        ];
    }

    public static function getHtmlCourses(): array
    {
        return [
            'courses' => [
                [
                    'id' => 2,
                    'fullname' => 'Course With &amp; &lt; html &gt;',
                    'shortname' => 'Intro Course',
                    'displayname' => 'My First Course',
                    'categoryid' => 2,
                    'categoryname' => 'Miscellaneous',
                    'sortorder' => 10001,
                    'summary' => '<p>This course is aimed at all staff</p>',
                    'summaryformat' => 1,
                    'summaryfiles' => [],
                    'overviewfiles' => [
                        [
                            'filename' => '4251.png',
                            'filepath' => '/',
                            'filesize' => 37306,
                            'fileurl' => 'http://moodle.test/webservice/pluginfile.php/45/course/overviewfiles/4251.png',
                            'timemodified' => 1589882661,
                            'mimetype' => 'image/png',
                        ],
                    ],
                    'contacts' => [],
                    'enrollmentmethods' => ['manual', 'self'],
                    'customfields' => [
                        [
                            'name' => 'Course Duration',
                            'shortname' => 'duration',
                            'type' => 'text',
                            'value' => '1 week',
                        ],
                        [
                            'name' => 'Course Type',
                            'shortname' => 'course_type',
                            'type' => 'text',
                            'value' => 'Online',
                        ],
                    ],
                    'idnumber' => '',
                    'format' => 'topics',
                    'showgrades' => 1,
                    'newsitems' => 5,
                    'startdate' => 1589929200,
                    'enddate' => 1621465200,
                    'maxbytes' => 0,
                    'showreports' => 0,
                    'visible' => 1,
                    'groupmode' => 0,
                    'groupmodeforce' => 0,
                    'defaultgroupingid' => 0,
                    'enablecompletion' => 1,
                    'completionnotify' => 0,
                    'lang' => 'en',
                    'theme' => '',
                    'marker' => 0,
                    'legacyfiles' => 0,
                    'calendartype' => '',
                    'timecreated' => 1589873173,
                    'timemodified' => 1589882661,
                    'requested' => 0,
                    'cacherev' => 1591624713,
                    'filters' => [],
                    'courseformatoptions' => [
                        [
                            'name' => 'hiddensections',
                            'value' => 0,
                        ],
                        [
                            'name' => 'coursedisplay',
                            'value' => 1,
                        ],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function getCourseContents(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Topic 1',
                'visible' => 1,
                'summary' => '<p>This is the first topic for the first course</p>',
                'summaryformat' => 1,
                'section' => 0,
                'hiddenbynumsections' => 0,
                'uservisible' => true,
                'modules' => [
                    [
                        'id' => 1,
                        'url' => 'http://moodle.test/mod/page/view.php?id=1',
                        'name' => 'Example Page',
                        'instance' => 1,
                        'visible' => 1,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/moove/page/1590132460/icon',
                        'modname' => 'page',
                        'modplural' => 'Pages',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 1,
                        'completiondata' => [
                            'state' => 1,
                            'timecompleted' => 1591093732,
                            'overrideby' => null,
                            'valueused' => true,
                        ],
                    ],
                    [
                        'id' => 2,
                        'url' => 'http://moodle.test/mod/scorm/view.php?id=2',
                        'name' => 'Example Scorm',
                        'instance' => 1,
                        'visible' => 1,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/boost/page/1592292950/icon',
                        'modname' => 'scorm',
                        'modplural' => 'Scorms',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 0,
                    ],
                    [
                        'id' => 3,
                        'url' => 'http://moodle.test/mod/assign/view.php?id=3',
                        'name' => 'Example Assignment',
                        'instance' => 1,
                        'visible' => 1,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/boost/page/1592292950/icon',
                        'modname' => 'assign',
                        'modplural' => 'Assignments',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 0,
                    ],
                    [
                        'id' => 4,
                        'url' => 'http://moodle.test/mod/assign/view.php?id=4',
                        'name' => 'Example File',
                        'instance' => 1,
                        'visible' => 1,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/boost/page/1592292950/icon',
                        'modname' => 'resource',
                        'modplural' => 'Resources',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 0,
                    ],
                ],
            ],
        ];
    }

    public static function courseCompletion(): array
    {
        return [
            'completionstatus' => [
                'completed' => true,
                'aggregation' => 1,
                'completions' => [
                    [
                        'type' => 1,
                        'title' => 'page',
                        'status' => 'incomplete',
                        'complete' => false,
                        'timecompleted' => null,
                        'details' => [],
                    ],
                    [
                        'type' => 1,
                        'title' => 'view page',
                        'status' => 'complete',
                        'complete' => true,
                        'timecompleted' => 1591093732,
                        'details' => [],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function courseModuleVisibility(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Topic 1',
                'visible' => 1,
                'summary' => '<p>This is the first topic for the first course</p>',
                'summaryformat' => 1,
                'section' => 0,
                'hiddenbynumsections' => 0,
                'uservisible' => true,
                'modules' => [
                    [
                        'id' => 1,
                        'url' => 'http://moodle.test/mod/page/view.php?id=1',
                        'name' => 'Example Page',
                        'instance' => 1,
                        'visible' => 0,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/moove/page/1590132460/icon',
                        'modname' => 'page',
                        'modplural' => 'Pages',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 1,
                        'completiondata' => [
                            'state' => 1,
                            'timecompleted' => 1591093732,
                            'overrideby' => null,
                            'valueused' => true,
                        ],
                    ],
                    [
                        'id' => 2,
                        'url' => 'http://moodle.test/mod/scorm/view.php?id=2',
                        'name' => 'Example Scorm',
                        'instance' => 1,
                        'visible' => 1,
                        'uservisible' => true,
                        'visibleoncoursepage' => 1,
                        'modicon' => 'http://moodle.test/theme/image.php/boost/page/1592292950/icon',
                        'modname' => 'scorm',
                        'modplural' => 'Scorms',
                        'availability' => null,
                        'indent' => 0,
                        'onclick' => '',
                        'afterlink' => null,
                        'customdata' => '""',
                        'noviewlink' => false,
                        'completion' => 0,
                    ],
                ],
            ],
        ];
    }

    public static function searchCourses(): array
    {
        return [
            'total' => 3,
            'courses' => [
                [
                    'id' => 2,
                    'fullname' => 'My First Course',
                    'displayname' => 'My First Course',
                    'shortname' => 'Intro Course',
                    'categoryid' => 2,
                    'categoryname' => 'Course Category',
                    'sortorder' => 20001,
                    'summary' => '<p>This course is aimed at all staff</p>',
                    'summaryformat' => 1,
                    'summaryfiles' => [],
                    'overviewfiles' => [
                        [
                            'filename' => '4251.png',
                            'filepath' => '/',
                            'filesize' => 37306,
                            'fileurl' => 'http=> //moodle.test/webservice/pluginfile.php/45/course/overviewfiles/4251.png',
                            'timemodified' => 1589882661,
                            'mimetype' => 'image/png',
                        ],
                    ],
                    'contacts' => [],
                    'enrollmentmethods' => ['manual', 'self'],
                ],
                CourseSearchCourse::make(),
                CourseSearchCourse::make(),
            ],
            'warnings' => [],
        ];
    }

    public static function searchFirstCourse(): array
    {
        return [
            'total' => 2,
            'courses' => [
                [
                    'id' => 2,
                    'fullname' => 'The First Course',
                    'shortname' => 'first_course',
                    'displayname' => 'The First Course',
                    'categoryid' => 1,
                    'categoryname' => 'First Category',
                    'sortorder' => 1,
                    'summary' => '<p>This is the summary for the first course</p>',
                    'summaryformat' => 1,
                    'summaryfiles' => [],
                    'overviewfiles' => [],
                    'contacts' => [],
                    'enrollmentmethods' => ['manual'],
                    'customfields' => [
                        [
                            'name' => 'Course Type',
                            'shortname' => 'course_type',
                            'type' => 'select',
                            'value' => 'Online',
                        ],
                        [
                            'name' => 'Course Duration',
                            'shortname' => 'course_duration',
                            'type' => 'text',
                            'value' => '1 week',
                        ],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function searchByCategory(): array
    {
        return [
            'courses' => [
                [
                    'id' => 3,
                    'fullname' => 'The Second Course',
                    'shortname' => 'second_course',
                    'displayname' => 'The Second Course',
                    'categoryid' => 1,
                    'categoryname' => 'Second Category',
                    'sortorder' => 1,
                    'summary' => '<p>This is the summary for the second course</p>',
                    'summaryformat' => 1,
                    'summaryfiles' => [],
                    'overviewfiles' => [],
                    'contacts' => [],
                    'enrollmentmethods' => ['manual', 'self'],
                    'customfields' => [
                        [
                            'name' => 'Course Type',
                            'shortname' => 'course_type',
                            'type' => 'select',
                            'value' => 'Distance Learning',
                        ],
                        [
                            'name' => 'Course Duration',
                            'shortname' => 'course_duration',
                            'type' => 'text',
                            'value' => '4 weeks',
                        ],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function getCourseModule(): array
    {
        return [
            'cm' => [
                'id' => 11,
                'course' => 2,
                'module' => 3,
                'name' => 'My first module',
                'modname' => 'book',
                'instance' => 2,
                'section' => 3,
                'sectionnum' => 2,
                'groupmode' => 0,
                'groupingid' => 0,
                'completion' => 2,
                'idnumber' => '',
                'added' => 1589878397,
                'score' => 0,
                'indent' => 0,
                'visible' => 1,
                'visibleoncoursepage' => 1,
                'visibleold' => 1,
                'completiongradeitemnumber' => null,
                'completionview' => 1,
                'completionexpected' => 0,
                'showdescription' => 1,
                'availability' => null,
            ],
            'warnings' => [],
        ];
    }

    public static function coursePages(): array
    {
        return [
            'pages' => [
                [
                    'id' => 1,
                    'coursemodule' => 2,
                    'course' => 2,
                    'name' => 'My First Page',
                    'intro' => '',
                    'introformat' => 1,
                    'introfiles' => [],
                    'content' => '<p>The page content</p>',
                    'contentformat' => 1,
                    'contentfiles' => [
                        [
                            'filename' => 'Page Image.png',
                            'filepath' => '/',
                            'filesize' => 11837,
                            'fileurl' => 'http://moodle.test/webservice/pluginfile.php/47/mod_page/content/0/page%20image.png',
                            'timemodified' => 1589874079,
                            'mimetype' => 'image/png',
                            'isexternalfile' => false,
                        ],
                    ],
                    'legacyfiles' => 0,
                    'legacyfileslast' => null,
                    'display' => 5,
                    'displayoptions' => 'a=> 3=> {s=> 12=> "printheading";s=> 1=> "1";s=> 10=> "printintro";s=> 1=> "0";s=> 17=> "printlastmodified";s=> 1=> "1";}',
                    'revision' => 1,
                    'timemodified' => 1589874079,
                    'section' => 1,
                    'visible' => 1,
                    'groupmode' => 0,
                    'groupingid' => 0,
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function enrolledUsers(): array
    {
        return [
            [
                'id' => 3,
                'username' => 'testuser',
                'firstname' => 'Test',
                'lastname' => 'User',
                'fullname' => 'Test User',
                'email' => 'test.user@fake.email',
                'department' => '',
                'firstaccess' => 1589799176,
                'lastaccess' => 1589872796,
                'lastcourseaccess' => 0,
                'description' => '',
                'descriptionformat' => 1,
                'profileimageurlsmall' => 'http =>//moodle.test/theme/image.php/moove/core/1590132460/u/f2',
                'profileimageurl' => 'http =>//moodle.test/theme/image.php/moove/core/1590132460/u/f1',
                'groups' => [],
                'roles' => [
                    [
                        'roleid' => 5,
                        'name' => '',
                        'shortname' => 'student',
                        'sortorder' => 0,
                    ],
                ],
                'preferences' => [],
                'enrolledcourses' => [
                    [
                        'id' => 2,
                        'fullname' => 'My First Course',
                        'shortname' => 'Short Course',
                    ],
                ],
            ],
        ];
    }

    public static function courseActivityStatuses(): array
    {
        return [
            'statuses' => [
                [
                    'cmid' => 2,
                    'modname' => 'page',
                    'instance' => 1,
                    'state' => 1,
                    'timecompleted' => 1589877760,
                    'tracking' => 2,
                    'overrideby' => null,
                    'valueused' => false,
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function badges(): array
    {
        return [
            'badges' => [
                [
                    'id' => 2,
                    'name' => 'BBS Complete',
                    'description' => 'Completed My First Course',
                    'timecreated' => 1591350979,
                    'timemodified' => 1591351005,
                    'usercreated' => 2,
                    'usermodified' => 2,
                    'issuername' => 'Business Systems',
                    'issuerurl' => 'http =>//moodle.test',
                    'issuercontact' => '',
                    'expiredate' => null,
                    'expireperiod' => null,
                    'type' => 2,
                    'courseid' => 2,
                    'message' => "<p>You have been awarded the badge \"%badgename%\"!</p>\n<p>More information about this badge can be found on the %badgelink% badge information page.</p>\n<p>You can manage and download the badge from your <a href=\"http =>//moodle.test/badges/mybadges.php\">Manage badges</a> page.</p>",
                    'messagesubject' => 'Congratulations! You just earned a badge!',
                    'attachment' => 1,
                    'notification' => 0,
                    'nextcron' => null,
                    'status' => 3,
                    'issuedid' => 2,
                    'uniquehash' => '7f3fcbbd0c5842e3ac0e9fc756a5ab4bf4719cac',
                    'dateissued' => 1591351005,
                    'dateexpire' => null,
                    'visible' => 1,
                    'email' => 'test.user@fake.email',
                    'version' => '',
                    'language' => 'en',
                    'imageauthorname' => '',
                    'imageauthoremail' => '',
                    'imageauthorurl' => '',
                    'imagecaption' => '',
                    'badgeurl' => 'http =>//moodle.test/webservice/pluginfile.php/45/badges/badgeimage/2/f1',
                    'alignment' => [],
                    'relatedbadges' => [],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function getScorms(): array
    {
        return [
            'scorms' => [
                [
                    'id' => 1,
                    'coursemodule' => 2,
                    'course' => 3,
                    'name' => 'Example scorm',
                    'intro' => '',
                    'introformat' => 1,
                    'introfiles' => [],
                    'packagesize' => 8536684,
                    'packageurl' => 'http =>//moodle.test/webservice/pluginfile.php/64/mod_scorm/package/0/EZMax%20Inventory%20Traing%20%5BTest%20Demo%20V2%5D.zip',
                    'version' => 'SCORM_1.2',
                    'maxgrade' => 100,
                    'grademethod' => 1,
                    'whatgrade' => 0,
                    'maxattempt' => 0,
                    'forcecompleted' => false,
                    'forcenewattempt' => 0,
                    'lastattemptlock' => false,
                    'displayattemptstatus' => 1,
                    'displaycoursestructure' => false,
                    'sha1hash' => '538c25803bec0394bbbce10be5288efa126c7e59',
                    'md5hash' => '',
                    'revision' => 1,
                    'launch' => 2,
                    'skipview' => 0,
                    'hidebrowse' => false,
                    'hidetoc' => 0,
                    'nav' => 1,
                    'navpositionleft' => -100,
                    'navpositiontop' => -100,
                    'auto' => false,
                    'popup' => 1,
                    'width' => 100,
                    'height' => 500,
                    'timeopen' => 0,
                    'timeclose' => 0,
                    'displayactivityname' => true,
                    'scormtype' => 'local',
                    'reference' => 'EZMax Inventory Traing [Test Demo V2].zip',
                    'protectpackagedownloads' => false,
                    'updatefreq' => 0,
                    'options' => 'scrollbars=0,directories=0,location=0,menubar=0,toolbar=0,status=0',
                    'completionstatusrequired' => null,
                    'completionscorerequired' => null,
                    'completionstatusallscos' => 0,
                    'autocommit' => false,
                    'timemodified' => 1589983865,
                    'section' => 1,
                    'visible' => true,
                    'groupmode' => 0,
                    'groupingid' => 0,
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function getScoes(): array
    {
        return [
            'scoes' => [
                0 => [
                    'id' => 1,
                    'scorm' => 1,
                    'manifest' => 'imsmanifest',
                    'organization' => '',
                    'parent' => '/',
                    'identifier' => 'imsmanifest_ORG',
                    'launch' => '',
                    'scormtype' => '',
                    'title' => 'Captivate E-Learning Course',
                    'sortorder' => 1,
                    'extradata' => [],
                ],
                1 => [
                    'id' => 2,
                    'scorm' => 1,
                    'manifest' => 'imsmanifest',
                    'organization' => 'imsmanifest_ORG',
                    'parent' => 'imsmanifest_ORG',
                    'identifier' => 'SCO_ID1',
                    'launch' => 'index_scorm.html',
                    'scormtype' => 'sco',
                    'title' => 'Course Object title',
                    'sortorder' => 2,
                    'extradata' => [
                        0 => [
                            'element' => 'isvisible',
                            'value' => 'true',
                        ],
                        1 => [
                            'element' => 'parameters',
                            'value' => '',
                        ],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function categories(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Miscellaneous',
                'idnumber' => null,
                'description' => '',
                'descriptionformat' => 1,
                'parent' => 0,
                'sortorder' => 10000,
                'coursecount' => 1,
                'visible' => 1,
                'visibleold' => 1,
                'timemodified' => 1589550212,
                'depth' => 1,
                'path' => '/1',
                'theme' => '',
            ],
            [
                'id' => 2,
                'name' => 'Web Systems',
                'idnumber' => null,
                'description' => '',
                'descriptionformat' => 1,
                'parent' => 0,
                'sortorder' => 10000,
                'coursecount' => 1,
                'visible' => 1,
                'visibleold' => 1,
                'timemodified' => 1589550212,
                'depth' => 1,
                'path' => '/1',
                'theme' => '',
            ],
            [
                'id' => 3,
                'name' => 'Business Briefing System',
                'idnumber' => null,
                'description' => '',
                'descriptionformat' => 1,
                'parent' => 2,
                'sortorder' => 10000,
                'coursecount' => 1,
                'visible' => 1,
                'visibleold' => 1,
                'timemodified' => 1589550212,
                'depth' => 1,
                'path' => '/1',
                'theme' => '',
            ],
        ];
    }

    public static function courseAssignments(): array
    {
        return [
            'courses' => [
                [
                    'id' => 3,
                    'fullname' => 'My First Course',
                    'shortname' => 'Short Course',
                    'timemodified' => 1591624712,
                    'assignments' => [
                        [
                            'id' => 1,
                            'cmid' => 16,
                            'course' => 3,
                            'name' => 'Example course assignment',
                            'nosubmissions' => 0,
                            'submissiondrafts' => 0,
                            'sendnotifications' => 0,
                            'sendlatenotifications' => 0,
                            'sendstudentnotifications' => 1,
                            'duedate' => 1590447600,
                            'allowsubmissionsfromdate' => 1589842800,
                            'grade' => 100,
                            'timemodified' => 1589882566,
                            'completionsubmit' => 1,
                            'cutoffdate' => 0,
                            'gradingduedate' => 1591052400,
                            'teamsubmission' => 0,
                            'requireallteammemberssubmit' => 0,
                            'teamsubmissiongroupingid' => 0,
                            'blindmarking' => 0,
                            'hidegrader' => 0,
                            'revealidentities' => 0,
                            'attemptreopenmethod' => 'none',
                            'maxattempts' => -1,
                            'markingworkflow' => 0,
                            'markingallocation' => 0,
                            'requiresubmissionstatement' => 0,
                            'preventsubmissionnotingroup' => 0,
                            'configs' => [
                                [
                                    'plugin' => 'onlinetext',
                                    'subtype' => 'assignsubmission',
                                    'name' => 'enabled',
                                    'value' => '1',
                                ],
                                [
                                    'plugin' => 'onlinetext',
                                    'subtype' => 'assignsubmission',
                                    'name' => 'wordlimit',
                                    'value' => '500',
                                ],
                                [
                                    'plugin' => 'onlinetext',
                                    'subtype' => 'assignsubmission',
                                    'name' => 'wordlimitenabled',
                                    'value' => '1',
                                ],
                                [
                                    'plugin' => 'comments',
                                    'subtype' => 'assignsubmission',
                                    'name' => 'enabled',
                                    'value' => '1',
                                ],
                                [
                                    'plugin' => 'comments',
                                    'subtype' => 'assignfeedback',
                                    'name' => 'enabled',
                                    'value' => '1',
                                ],
                                [
                                    'plugin' => 'comments',
                                    'subtype' => 'assignfeedback',
                                    'name' => 'commentinline',
                                    'value' => '0',
                                ],
                            ],
                            'intro' => 'Your assignment is to read the files and then submit your response below within 500 words.',
                            'introformat' => 1,
                            'introfiles' => [],
                            'introattachments' => [],
                        ],
                    ],
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function assessmentStatus(): array
    {
        return [
            'lastattempt' => [
                'submission' => [
                    'id' => 3,
                    'userid' => 4,
                    'attemptnumber' => 0,
                    'timecreated' => 1592295803,
                    'timemodified' => 1594914156,
                    'status' => 'submitted',
                    'groupid' => 0,
                    'assignment' => 1,
                    'latest' => 1,
                    'plugins' => [
                        [
                            'type' => 'onlinetext',
                            'name' => 'Online text',
                            'fileareas' => [
                                [
                                    'area' => 'submissions_onlinetext',
                                    'files' => [],
                                ],
                            ],
                            'editorfields' => [
                                [
                                    'name' => 'onlinetext',
                                    'description' => 'Online text submissions',
                                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                                    'format' => 1,
                                ],
                            ],
                        ],
                        [
                            'type' => 'comments',
                            'name' => 'Submission comments',
                        ],
                    ],
                ],
                'submissiongroupmemberswhoneedtosubmit' => [],
                'submissionsenabled' => true,
                'locked' => false,
                'graded' => false,
                'canedit' => true,
                'caneditowner' => true,
                'cansubmit' => false,
                'extensionduedate' => null,
                'blindmarking' => false,
                'gradingstatus' => 'notgraded',
                'usergroups' => [],
            ],
            'warnings' => [],
        ];
    }

    public static function assessmentStatusNoLastAttempt(): array
    {
        return [
            'lastattempt' => [
                'submission' => null,
                'submissiongroupmemberswhoneedtosubmit' => [],
                'submissionsenabled' => true,
                'locked' => false,
                'graded' => false,
                'canedit' => true,
                'caneditowner' => true,
                'cansubmit' => false,
                'extensionduedate' => null,
                'blindmarking' => false,
                'gradingstatus' => 'notgraded',
                'usergroups' => [],
            ],
            'warnings' => [],
        ];
    }

    public static function getGrades(): array
    {
        return [
            'grades' => [
                [
                    'courseid' => 2,
                    'grade' => 'B',
                    'rawgrade' => null,
                ],
                [
                    'courseid' => 3,
                    'grade' => 'A',
                    'rawgrade' => null,
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function getResources(): array
    {
        return [
            'resources' => [
                [
                    'id' => 1,
                    'coursemodule' => 4,
                    'course' => 2,
                    'name' => 'Example file',
                    'intro' => '',
                    'introformat' => 1,
                    'introfiles' => [],
                    'contentfiles' => [
                        [
                            'filename' => 'An example excel file.xlsx',
                            'filepath' => '/',
                            'filesize' => 91901,
                            'fileurl' => 'http://moodle.fake/webservice/pluginfile.php/62/mod_resource/content/0/Waste%20report%202019-20%20-%20categorised.xlsx',
                            'timemodified' => 1589882475,
                            'mimetype' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'isexternalfile' => false,
                        ],
                    ],
                    'tobemigrated' => 0,
                    'legacyfiles' => 0,
                    'legacyfileslast' => null,
                    'display' => 0,
                    'displayoptions' => 'a:1:[s:10:"printintro";i:1;]',
                    'filterfiles' => 0,
                    'revision' => 1,
                    'timemodified' => 1589882475,
                    'section' => 1,
                    'visible' => 1,
                    'groupmode' => 0,
                    'groupingid' => 0,
                ],
                [
                    'id' => 2,
                    'coursemodule' => 5,
                    'course' => 2,
                    'name' => 'Second file',
                    'intro' => '',
                    'introformat' => 1,
                    'introfiles' => [],
                    'contentfiles' => [
                        [
                            'filename' => 'An second excel file.xlsx',
                            'filepath' => '/',
                            'filesize' => 91901,
                            'fileurl' => 'http://moodle.fake/webservice/pluginfile.php/62/mod_resource/content/0/Waste%20report%202019-20%20-%20categorised.xlsx',
                            'timemodified' => 1589882475,
                            'mimetype' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'isexternalfile' => false,
                        ],
                    ],
                    'tobemigrated' => 0,
                    'legacyfiles' => 0,
                    'legacyfileslast' => null,
                    'display' => 0,
                    'displayoptions' => 'a:1:[s:10:"printintro";i:1;]',
                    'filterfiles' => 0,
                    'revision' => 1,
                    'timemodified' => 1589882475,
                    'section' => 1,
                    'visible' => 1,
                    'groupmode' => 0,
                    'groupingid' => 0,
                ],
            ],
            'warnings' => [],
        ];
    }

    public static function calendarResponse(): array
    {
        return [
            'url' => 'http://moodle.test/calendar',
            'courseid' => 1,
            'categoryid' => 0,
            'filter_selector' => 'some html',
            'weeks' => [
                [
                    'prepadding' => [],
                    'postpadding' => [],
                    'days' => [
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 1,
                            'wday' => 1,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 2,
                            'wday' => 2,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [
                                [
                                    'id' => 13,
                                    'name' => 'Classroom Attendance',
                                    'description' => '',
                                    'descriptionformat' => 1,
                                    'location' => '',
                                    'categoryid' => null,
                                    'groupid' => null,
                                    'userid' => 2,
                                    'repeatid' => null,
                                    'eventcount' => null,
                                    'component' => 'mod_attendance',
                                    'modulename' => 'attendance',
                                    'instance' => 18,
                                    'eventtype' => 'attendance',
                                    'timestart' => 1596787200,
                                    'timeduration' => 3600,
                                    'timesort' => 1596787200,
                                    'visible' => 1,
                                    'timemodified' => 1596120868,
                                    'icon' => [
                                        'key' => 'icon',
                                        'component' => 'attendance',
                                        'alttext' => 'Activity event',
                                    ],
                                    'course' => [
                                        'id' => 3,
                                        'fullname' => 'Example Course',
                                        'shortname' => 'Example Course',
                                        'idnumber' => '',
                                        'summary' => 'The course summary',
                                        'summaryformat' => 1,
                                        'startdate' => 1590361200,
                                        'enddate' => 1591578000,
                                        'visible' => true,
                                        'fullnamedisplay' => 'The Example Course',
                                        'viewurl' => '',
                                        'courseimage' => '',
                                        'progress' => 50,
                                        'hasprogress' => true,
                                        'isfavourite' => false,
                                        'hidden' => false,
                                        'showshortname' => false,
                                        'coursecategory' => 'BravoNR',
                                    ],
                                    'subscription' => [],
                                    'canedit' => false,
                                    'candelete' => false,
                                    'deleteurl' => '',
                                    'editurl' => '',
                                    'viewurl' => '',
                                    'formattedtime' => '9am - 10am',
                                    'isactionevent' => true,
                                    'iscategoryevent' => false,
                                    'iscourseevent' => false,
                                    'groupname' => null,
                                    'normalisedeventtype' => 'course',
                                    'normalisedeventtypetext' => 'Course event',
                                    'url' => '',
                                    'islastday' => true,
                                    'popupname' => 'Example Course: Classroom Attendance',
                                    'draggable' => false,
                                ],
                            ],
                            'hasevents' => true,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 3,
                            'wday' => 3,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 4,
                            'wday' => 4,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 5,
                            'wday' => 5,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 6,
                            'wday' => 6,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                        [
                            'seconds' => 0,
                            'minutes' => 0,
                            'hours' => 0,
                            'mday' => 7,
                            'wday' => 7,
                            'year' => 2020,
                            'yday' => 213,
                            'istoday' => false,
                            'isweekend' => true,
                            'timestamp' => 1596236400,
                            'neweventtimestamp' => 1596278510,
                            'viewdaylink' => 'http://moodle.test/calendar/view.php?view=day&time=1596236400',
                            'events' => [],
                            'hasevents' => false,
                            'calendareventtypes' => [],
                            'previousperiod' => 1596150000,
                            'nextperiod' => 1596322800,
                            'navigation' => '',
                            'haslastdayofevent' => false,
                            'popovertitle' => '',
                        ],
                    ],
                ],
            ],
            'daynames' => [
                [
                    'dayno' => 1,
                    'shortname' => 'Mon',
                    'fullname' => 'Monday',
                ],
                [
                    'dayno' => 2,
                    'shortname' => 'Tue',
                    'fullname' => 'Tuesday',
                ],
                [
                    'dayno' => 3,
                    'shortname' => 'Wed',
                    'fullname' => 'Wednesday',
                ],
                [
                    'dayno' => 4,
                    'shortname' => 'Thu',
                    'fullname' => 'Thursday',
                ],
                [
                    'dayno' => 5,
                    'shortname' => 'Fri',
                    'fullname' => 'Friday',
                ],
                [
                    'dayno' => 6,
                    'shortname' => 'Sat',
                    'fullname' => 'Saturday',
                ],
                [
                    'dayno' => 7,
                    'shortname' => 'Sun',
                    'fullname' => 'Sunday',
                ],
            ],
            'view' => 'month',
            'date' => [],
            'periodname' => 'August 2020',
            'includenavigation' => true,
            'initialeventsloaded' => true,
            'previousperiod' => [],
            'previousperiodlink' => '',
            'previousperiodname' => 'July 2020',
            'nextperiod' => [],
            'nextperiodname' => 'September 2020',
            'nextperiodlink' => '',
            'larrow' => '&#x25C4;',
            'rarrow' => '&#x25BA;',
            'defaulteventcontext' => 2,
        ];
    }

    public static function getCourseDelegates(): array
    {
        return [
            [
                'id' => 10,
                'username' => 'testuser',
                'firstname' => 'test',
                'lastname' => 'user',
                'fullname' => 'Test User',
                'email' => 'test.user@example.com',
                'firstaccess' => 1589550236,
                'lastaccess' => 1591093732,
                'lastcourseaccess' => 1591093732,
                'descriptionformat' => 1,
                'profileimageurlsmall' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f2',
                'profileimageurl' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f1',
                'description' => 'Goose Wrangler',
                'department' => 'The Lakes',
                'institution' => 'A Small Boat',
                'city' => 'Furzton',
                'address' => 'ABC 123',
                'groups' => null,
                'roles' => [
                    [
                        'roleid' => 3,
                        'name' => '',
                        'shortname' => 'editingteacher',
                        'sortorder' => 0,
                    ],
                    [
                        'roleid' => 5,
                        'name' => '',
                        'shortname' => 'student',
                        'sortorder' => 0,
                    ],
                ],
                'enrolledcourses' => [
                    [
                        'id' => 2,
                        'fullname' => 'The First Course',
                        'shortname' => 'first_course',
                    ],
                ],
            ],
            [
                'id' => 11,
                'username' => 'seconduser',
                'firstname' => 'Second',
                'lastname' => 'User',
                'fullname' => 'Second User',
                'email' => 'second.user@example.com',
                'firstaccess' => 1589550236,
                'lastaccess' => 1591093732,
                'lastcourseaccess' => 1591093732,
                'descriptionformat' => 1,
                'profileimageurlsmall' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f2',
                'profileimageurl' => 'http://moodle.test/theme/image.php/moove/core/1590132460/u/f1',
                'description' => 'Goose Wrangler',
                'department' => 'The Lakes',
                'institution' => 'A Small Boat',
                'city' => 'Furzton',
                'address' => 'ABC 123',
                'groups' => null,
                'roles' => [
                    [
                        'roleid' => 5,
                        'name' => '',
                        'shortname' => 'student',
                        'sortorder' => 0,
                    ],
                ],
                'enrolledcourses' => [
                    [
                        'id' => 2,
                        'fullname' => 'The First Course',
                        'shortname' => 'first_course',
                    ],
                ],
            ],
        ];
    }

    public static function selfEnrol(): array
    {
        return [
            'status' => true,
            'warnings' => [],
        ];
    }

    public static function manualEnrol(): array
    {
        return [
            'status' => true,
            'warnings' => [],
        ];
    }
}
