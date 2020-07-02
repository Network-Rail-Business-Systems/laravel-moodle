<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Stubs;

use Illuminate\Foundation\Auth\User as Eloquent;

class User extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'username', 'moodle_id'];
}
