<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Badge extends DataTransferObject
{
    use HasDates;
    protected $dates = ['timecreated', 'timemodified', 'dateissued'];

    /** @var integer **/
    public $id;

    /** @var string **/
    public $name;

    /** @var string **/
    public $description;

    /** @var integer **/
    public $timecreated;

    /** @var integer **/
    public $timemodified;

    /** @var integer|null **/
    public $usercreated;

    /** @var integer|null **/
    public $usermodified;

    /** @var string **/
    public $issuername;

    /** @var mixed|null|string **/
    public $issuerurl;

    /** @var string **/
    public $issuercontact;

    /** @var mixed|null|string **/
    public $expiredate;

    /** @var mixed|null|string **/
    public $expireperiod;

    /** @var integer **/
    public $type;

    /** @var int|null **/
    public $courseid;

    /** @var string|null **/
    public $message;

    /** @var string|null **/
    public $messagesubject;

    /** @var integer **/
    public $attachment;

    /** @var integer **/
    public $notification;

    /** @var mixed|null|string **/
    public $nextcron;

    /** @var integer **/
    public $status;

    /** @var integer|null **/
    public $issuedid;

    /** @var string **/
    public $uniquehash;

    /** @var integer **/
    public $dateissued;

    /** @var mixed|null|integer **/
    public $dateexpire;

    /** @var integer **/
    public $visible;

    /** @var string|null **/
    public $email;

    /** @var string **/
    public $version;

    /** @var string **/
    public $language;

    /** @var string **/
    public $imageauthorname;

    /** @var string **/
    public $imageauthoremail;

    /** @var string **/
    public $imageauthorurl;

    /** @var string **/
    public $imagecaption;

    /** @var string **/
    public $badgeurl;

    /** @var array **/
    public $alignment;

    /** @var mixed|null|array **/
    public $relatedbadges;
}
