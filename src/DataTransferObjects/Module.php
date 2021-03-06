<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasActivity;
use NetworkRailBusinessSystems\LaravelMoodle\Traits\HasDates;
use Spatie\DataTransferObject\DataTransferObject;

class Module extends DataTransferObject
{
    use HasDates;
    use HasActivity;

    protected $dates = ['added'];

    /** @var integer */
    public $id;

    /** @var string **/
    public $url;

    /** @var string **/
    public $name;

    /** @var integer **/
    public $instance;

    /** @var mixed|null|string */
    public $description;

    /** @var integer */
    public $visible;

    /** @var boolean **/
    public $uservisible;

    /** @var integer **/
    public $visibleoncoursepage;

    /** @var string **/
    public $modicon;

    /** @var string **/
    public $modname;

    /** @var string **/
    public $modplural;

    /** @var mixed|null|string **/
    public $availability;

    /** @var integer **/
    public $indent;

    /** @var string **/
    public $onclick;

    /** @var mixed|null|string **/
    public $afterlink;

    /** @var string **/
    public $customdata;

    /** @var boolean **/
    public $noviewlink;

    /** @var integer **/
    public $completion;

    /** @var mixed|null|\NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\CompletionData */
    public $completiondata;

    /** @var mixed|null|array */
    public $contents;

    public $contentsinfo;
}
