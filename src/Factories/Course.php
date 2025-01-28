<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Course as MoodleCourse;

class Course extends MoodleFactory
{
    public function makeOne(): MoodleCourse
    {
        return new MoodleCourse([
            'cacherev' => $this->faker->randomNumber(),
            'calendartype' => $this->faker->word(),
            'categoryid' => $this->faker->randomNumber(),
            'categoryname' => $this->faker->name(),
            'completionnotify' => $this->faker->randomNumber(),
            'contacts' => [],
            'courseformatoptions' => [],
            'customfields' => CustomField::makeMany(),
            'defaultgroupingid' => $this->faker->randomNumber(),
            'displayname' => $this->faker->name(),
            'enablecompletion' => $this->faker->randomNumber(),
            'enddate' => $this->faker->unixTime(),
            'enrollmentmethods' => [],
            'filters' => [],
            'format' => $this->faker->word(),
            'fullname' => $this->faker->name(),
            'groupmode' => $this->faker->randomNumber(),
            'groupmodeforce' => $this->faker->randomNumber(),
            'id' => $this->faker->randomNumber(),
            'idnumber' => $this->faker->word(),
            'lang' => $this->faker->languageCode(),
            'legacyfiles' => $this->faker->randomNumber(),
            'marker' => $this->faker->randomNumber(),
            'maxbytes' => $this->faker->randomNumber(),
            'newsitems' => $this->faker->randomNumber(),
            'overviewfiles' => FileObject::makeMany(),
            'requested' => $this->faker->randomNumber(),
            'shortname' => $this->faker->name(),
            'showgrades' => $this->faker->randomNumber(),
            'showreports' => $this->faker->randomNumber(),
            'sortorder' => $this->faker->randomNumber(),
            'startdate' => $this->faker->unixTime(),
            'summary' => $this->faker->word(),
            'summaryfiles' => FileObject::makeMany(),
            'summaryformat' => $this->faker->randomNumber(),
            'theme' => $this->faker->word(),
            'timecreated' => $this->faker->unixTime(),
            'timemodified' => $this->faker->unixTime(),
            'visible' => $this->faker->randomNumber(),
        ]);
    }
}
