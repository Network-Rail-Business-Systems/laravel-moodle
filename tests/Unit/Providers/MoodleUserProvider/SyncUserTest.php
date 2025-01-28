<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit\Providers\MoodleUserProvider;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class SyncUserTest extends TestCase
{
    protected MoodleUserProvider $provider;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        Http::fake([
            '*' => Http::response(MockResponses::userSearch()),
        ]);

        $this->user = new User([
            'username' => 'testuser',
        ]);

        $this->provider = new MoodleUserProvider();
        $this->provider->syncUser($this->user);
    }

    public function testSyncsDetails(): void
    {
        $this->assertDatabaseHas('users', [
            'email' => 'test.user@fake.email',
            'moodle_id' => 2,
            'name' => 'Test User',
            'username' => 'testuser',
        ]);
    }
}
