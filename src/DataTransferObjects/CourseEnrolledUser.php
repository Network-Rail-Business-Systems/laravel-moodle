<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseEnrolledUser extends FlexibleDataTransferObject
{
    /** @var int * */
    public $id;

    /** @var string|null * */
    public $username;

    /** @var string|null * */
    public $firstname;

    /** @var string|null * */
    public $lastname;

    /** @var string */
    public $fullname;

    /** @var string * */
    public $email;

    /** @var string|null * */
    public $department;

    /** @var int * */
    public $firstaccess;

    /** @var int * */
    public $lastaccess;

    /** @var int */
    public $lastcourseaccess;

    /** @var null|string * */
    public $description;

    /** @var null|int * */
    public $descriptionformat;

    /** @var string * */
    public $profileimageurlsmall;

    /** @var string * */
    public $profileimageurl;

    /** @var array|null */
    public $groups;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\Role[] */
    public $roles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\EnrolledCourse[] */
    public $enrolledcourses;
}
