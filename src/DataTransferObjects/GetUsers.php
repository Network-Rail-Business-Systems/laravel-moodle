<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class GetUsers extends FlexibleDataTransferObject
{
    /** @var User[] */
    public array $users;

    /** @var Warning[] */
    public array $warnings;
}
