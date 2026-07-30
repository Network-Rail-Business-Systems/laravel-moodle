<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseEnrolledUser extends FlexibleDataTransferObject
{
    public int $id;

    public ?string $username;

    public ?string $firstname;

    public ?string $lastname;

    public string $fullname;

    public string $email;

    public ?string $department;

    public int $firstaccess;

    public int $lastaccess;

    public int $lastcourseaccess;

    public ?string $description;

    public ?int $descriptionformat;

    public string $profileimageurlsmall;

    public string $profileimageurl;

    public ?array $groups;

    /** @var Role[] */
    public array $roles;

    /** @var EnrolledCourse[] */
    public array $enrolledcourses;
}
