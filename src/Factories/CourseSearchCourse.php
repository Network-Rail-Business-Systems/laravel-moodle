<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CourseSearchCourse as MoodleCourseSearchCourse;

class CourseSearchCourse extends MoodleFactory
{
    public function makeOne(): MoodleCourseSearchCourse
    {
        return new MoodleCourseSearchCourse([
            'categoryid' => $this->faker->randomNumber(),
            'categoryname' => $this->faker->words(3, true),
            'completed' => $this->faker->boolean(),
            'contacts' => [],
            'customfields' => CustomField::makeMany(),
            'displayname' => $this->faker->words(3, true),
            'enrollmentmethods' => [],
            'fullname' => $this->faker->words(3, true),
            'grade' => Grade::make(),
            'id' => $this->faker->randomNumber(),
            'overviewfiles' => FileObject::makeMany(),
            'percentage' => $this->faker->randomNumber(),
            'shortname' => $this->faker->words(3, true),
            'sortorder' => $this->faker->randomNumber(),
            'summary' => $this->faker->words(3, true),
            'summaryfiles' => FileObject::makeMany(),
            'summaryformat' => $this->faker->randomNumber(),
        ]);
    }
}
