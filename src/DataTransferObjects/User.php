<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class User extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['firstaccess', 'lastaccess'];

    public int $id;

    public string $username;

    public ?string $firstname;

    public ?string $lastname;

    public string $fullname;

    public string $email;

    public string $department;

    public int $firstaccess;

    public int $lastaccess;

    public string $auth;

    public bool $suspended;

    public bool $confirmed;

    public string $lang;

    public string $theme;

    public string $timezone;

    public int $mailformat;

    public ?string $description;

    public ?int $descriptionformat;

    public string $profileimageurlsmall;

    public string $profileimageurl;

    public ?string $institution;

    public ?string $city;

    public ?string $address;
}
