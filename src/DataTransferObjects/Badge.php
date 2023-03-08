<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Badge extends FlexibleDataTransferObject
{
    use HasDates;

    protected $dates = ['timecreated', 'timemodified', 'dateissued'];

    /** @var int * */
    public $id;

    /** @var string * */
    public $name;

    /** @var string * */
    public $description;

    /** @var int * */
    public $timecreated;

    /** @var int * */
    public $timemodified;

    /** @var int|null * */
    public $usercreated;

    /** @var int|null * */
    public $usermodified;

    /** @var string * */
    public $issuername;

    /** @var mixed|null|string * */
    public $issuerurl;

    /** @var string * */
    public $issuercontact;

    /** @var mixed|null|string * */
    public $expiredate;

    /** @var mixed|null|string * */
    public $expireperiod;

    /** @var int * */
    public $type;

    /** @var int|null * */
    public $courseid;

    /** @var string|null * */
    public $message;

    /** @var string|null * */
    public $messagesubject;

    /** @var int * */
    public $attachment;

    /** @var int * */
    public $notification;

    /** @var mixed|null|string * */
    public $nextcron;

    /** @var int * */
    public $status;

    /** @var int|null * */
    public $issuedid;

    /** @var string * */
    public $uniquehash;

    /** @var int * */
    public $dateissued;

    /** @var mixed|null|int * */
    public $dateexpire;

    /** @var int * */
    public $visible;

    /** @var string|null * */
    public $email;

    /** @var string * */
    public $version;

    /** @var string * */
    public $language;

    /** @var string * */
    public $imageauthorname;

    /** @var string * */
    public $imageauthoremail;

    /** @var string * */
    public $imageauthorurl;

    /** @var string * */
    public $imagecaption;

    /** @var string * */
    public $badgeurl;

    /** @var array * */
    public $alignment;

    /** @var mixed|null|array * */
    public $relatedbadges;
}
