<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasActivity;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class Module extends FlexibleDataTransferObject
{
    use HasDates;
    use HasActivity;

    protected $dates = ['added'];

    /** @var int */
    public $id;

    /** @var string * */
    public $url;

    /** @var string * */
    public $name;

    /** @var int * */
    public $instance;

    /** @var mixed|null|string */
    public $description;

    /** @var int */
    public $visible;

    /** @var bool * */
    public $uservisible;

    /** @var int * */
    public $visibleoncoursepage;

    /** @var string * */
    public $modicon;

    /** @var string * */
    public $modname;

    /** @var string * */
    public $modplural;

    /** @var mixed|null|string * */
    public $availability;

    /** @var int * */
    public $indent;

    /** @var string * */
    public $onclick;

    /** @var mixed|null|string * */
    public $afterlink;

    /** @var string * */
    public $customdata;

    /** @var bool * */
    public $noviewlink;

    /** @var int * */
    public $completion;

    /** @var mixed|null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CompletionData */
    public $completiondata;

    /** @var mixed|null|array */
    public $contents;

    public $contentsinfo;
}
