<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Completion as MoodleCompletion;

class CourseEnrolledUser extends MoodleFactory
{
    public function makeOne(): MoodleCompletion
    {
        return new MoodleCompletion([
            '$descriptionformat' => $this->faker->randomNumber(),
            'department' => $this->faker->company(),
            'description' => $this->faker->words(3, true),
            'email' => $this->faker->email(),
            'enrolledcourses' => EnrolledCourse::makeMany(),
            'firstaccess' => $this->faker->randomNumber(),
            'firstname' => $this->faker->firstName(),
            'fullname' => $this->faker->name(),
            'groups' => [],
            'id' => $this->faker->randomNumber(),
            'lastaccess' => $this->faker->randomNumber(),
            'lastcourseaccess' => $this->faker->randomNumber(),
            'lastname' => $this->faker->lastName(),
            'profileimageurl' => $this->faker->url(),
            'profileimageurlsmall' => $this->faker->url(),
            'roles' => Role::makeMany(),
            'username' => $this->faker->userName(),
        ]);
    }
}
