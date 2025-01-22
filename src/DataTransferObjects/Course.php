<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCourseImages;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasCustomFields;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasEnrollements;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Course extends FlexibleDataTransferObject
{
    use HasDates;
    use HasCourseImages;
    use HasCustomFields;
    use HasEnrollements;

    protected array $dates = ['startdate', 'enddate', 'timecreated', 'timemodified'];

    public int $id;

    public string $fullname;

    public string $shortname;

    public string $displayname;

    public int $categoryid;

    public string $categoryname;

    public int $sortorder;

    public string $summary;

    public int $summaryformat;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $summaryfiles;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject[] */
    public array $overviewfiles;

    public array $contacts;

    public array $enrollmentmethods;

    /** @var \NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CustomField[] */
    public array $customfields;

    public ?string $idnumber;

    public ?string $format;

    public ?int $showgrades;

    public ?int $newsitems;

    public ?int $startdate;

    public ?int $enddate;

    public ?int $maxbytes;

    public ?int $showreports;

    public ?int $visible;

    public ?int $groupmode;

    public ?int $groupmodeforce;

    public ?int $defaultgroupingid;

    public ?int $enablecompletion;

    public ?int $completionnotify;

    public ?string $lang;

    public ?string $theme;

    public ?int $marker;

    public ?int $legacyfiles;

    public ?string $calendartype;

    public ?int $timecreated;

    public ?int $timemodified;

    public ?int $requested;

    public ?int $cacherev;

    public ?array $filters;

    public array $courseformatoptions;

    public function fullname(): string
    {
        return html_entity_decode($this->fullname);
    }
}
