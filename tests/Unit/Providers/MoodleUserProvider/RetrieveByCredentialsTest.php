<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit\Providers\MoodleUserProvider;

use Illuminate\Database\Eloquent\Model;
use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class RetrieveByCredentialsTest extends TestCase
{
    protected MoodleUserProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userProvider = new MoodleUserProvider;
    }

    public function test_finds_existing(): void
    {
        User::create([
            'email' => 'test.user@fake.email',
            'name' => 'Test User',
            'username' => 'testuser',
        ]);

        $this->assertTrue(
            $this->retrieve()->exists
        );
    }

    public function test_makes_new(): void
    {
        $this->assertFalse(
            $this->retrieve()->exists
        );
    }

    protected function retrieve(): Model
    {
        return $this->userProvider->retrieveByCredentials([
            'username' => 'testuser',
        ]);
    }
}
