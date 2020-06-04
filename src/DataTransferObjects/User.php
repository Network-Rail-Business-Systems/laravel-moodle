<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class User extends FlexibleDataTransferObject
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

    /** @var string **/
    public $auth;

    /** @var boolean **/
    public $suspended;

    /** @var boolean **/
    public $confirmed;

    /** @var string **/
    public $lang;

    /** @var string **/
    public $theme;

    /** @var string **/
    public $timezone;

    /** @var integer **/
    public $mailformat;

    /** @var string **/
    public $description;

    /** @var integer **/
    public $descriptionformat;

    /** @var string **/
    public $profileimageurlsmall;

    /** @var string **/
    public $profileimageurl;
}
