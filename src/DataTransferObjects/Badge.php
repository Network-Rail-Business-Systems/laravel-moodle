<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Badge extends FlexibleDataTransferObject
{
    use HasDates;

    protected array $dates = ['timecreated', 'timemodified', 'dateissued'];

    public int $id;

    public string $name;

    public string $description;

    public int $timecreated;

    public int $timemodified;

    public ?int $usercreated;

    public ?int $usermodified;

    public string $issuername;

    public string $issuerurl;

    public string $issuercontact;

    public mixed $expiredate;

    public mixed $expireperiod;

    public int $type;

    public ?int $courseid;

    public ?string $message;

    public ?string $messagesubject;

    public int $attachment;

    public int $notification;

    public mixed $nextcron;

    public int $status;

    public ?int $issuedid;

    public string $uniquehash;

    public int $dateissued;

    public mixed $dateexpire;

    public int $visible;

    public ?string $email;

    public string $version;

    public string $language;

    public string $imageauthorname;

    public string $imageauthoremail;

    public string $imageauthorurl;

    public string $imagecaption;

    public string $badgeurl;

    public array $alignment;

    public mixed $relatedbadges;
}
