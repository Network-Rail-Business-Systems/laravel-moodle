<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class User extends FlexibleDataTransferObject
{
    use HasDates;
    protected $dates = ['firstaccess', 'lastaccess'];

    /** @var integer **/
    public $id;

    /** @var string **/
    public $username;

    /** @var string|null **/
    public $firstname;

    /** @var string|null **/
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

    /** @var string|null **/
    public $description;

    /** @var integer|null **/
    public $descriptionformat;

    /** @var string **/
    public $profileimageurlsmall;

    /** @var string **/
    public $profileimageurl;

    /** @var string|null **/
    public $institution;

    /** @var string|null **/
    public $city;

    /** @var string|null **/
    public $address;
}
