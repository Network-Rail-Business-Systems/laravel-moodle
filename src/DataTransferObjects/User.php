<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class User extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['firstaccess', 'lastaccess'];

    /** @var int * */
    public $id;

    /** @var string * */
    public $username;

    /** @var string|null * */
    public $firstname;

    /** @var string|null * */
    public $lastname;

    /** @var string */
    public $fullname;

    /** @var string * */
    public $email;

    /** @var string * */
    public $department;

    /** @var int * */
    public $firstaccess;

    /** @var int * */
    public $lastaccess;

    /** @var string * */
    public $auth;

    /** @var bool * */
    public $suspended;

    /** @var bool * */
    public $confirmed;

    /** @var string * */
    public $lang;

    /** @var string * */
    public $theme;

    /** @var string * */
    public $timezone;

    /** @var int * */
    public $mailformat;

    /** @var string|null * */
    public $description;

    /** @var int|null * */
    public $descriptionformat;

    /** @var string * */
    public $profileimageurlsmall;

    /** @var string * */
    public $profileimageurl;

    /** @var string|null * */
    public $institution;

    /** @var string|null * */
    public $city;

    /** @var string|null * */
    public $address;
}
