<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit\Providers\MoodleUserProvider;

use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class SyncUserTest extends TestCase
{
    const DETAILS = [
        'email' => 'goose@example.com',
        'fullname' => 'Goose',
        'username' => 'goose',
    ];

    protected MoodleUserProvider $provider;

    public function setUp(): void
    {
        parent::setUp();

        $this->provider = new MoodleUserProvider();
    }

    public function testCreatesUser(): void
    {
        $this->runSync();

        $this->assertDatabaseHas('users', [
            'email' => 'goose@example.com',
            'moodle_id' => null,
            'name' => 'Goose',
            'username' => 'goose',
        ]);
    }

    public function testUpdatesUser(): void
    {
        User::create([
            'email' => 'banana@example.com',
            'name' => 'Banana',
            'username' => 'goose',
        ]);

        $this->runSync();

        $this->assertDatabaseHas('users', [
            'email' => 'goose@example.com',
            'moodle_id' => null,
            'name' => 'Goose',
            'username' => 'goose',
        ]);
    }

    protected function runSync(): void
    {
        $this->provider->syncUser(self::DETAILS);
    }
}
