<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs;

use Illuminate\Foundation\Auth\User as Eloquent;

class User extends Eloquent
{
    protected $fillable = ['name', 'email', 'moodle_id'];

    protected $casts = [
        'moodle_id' => 'int',
    ];
}
