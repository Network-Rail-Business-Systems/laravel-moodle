<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Stubs;

class CalendarResponses
{
    public static function calendarResponse()
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
                            'mday' => 1,
                            'wday' => 6,
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
                                    'course' => [],
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
}
