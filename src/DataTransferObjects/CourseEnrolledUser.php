<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class CourseEnrolledUser extends FlexibleDataTransferObject
{
    /** @var integer **/
    public $id;

    /** @var string **/
    public $username;

    /** @var string **/
    public $firstname;

    /** @var string **/
    public $lastname;

    /** @var string */
    public $fullname;

    /** @var string **/
    public $email;

    /** @var string **/
    public $department;

    /** @var integer **/
    public $firstaccess;

    /** @var integer **/
    public $lastaccess;

    /** @var integer */
    public $lastcourseaccess;

    /** @var string **/
    public $description;

    /** @var integer **/
    public $descriptionformat;

    /** @var string **/
    public $profileimageurlsmall;

    /** @var string **/
    public $profileimageurl;

    /** @var array */
    public $groups;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\Role[] */
    public $roles;

    /** @var \NRBusinessSystems\LaraMoodle\DataTransferObjects\EnrolledCourse[] */
    public $enrolledcourses;
}
