<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class UserSearchTest extends TestCase
{
    public function test_search_users(): void
    {
        Http::fake([
            '*' => Http::response(MockResponses::userSearch()),
        ]);

        $users = LaravelMoodle::searchUsers('testuser');

        $this->assertNotNull($users);
        $this->assertEquals('testuser', $users->users[0]->username);
        $this->assertEquals('Test User', $users->users[0]->fullname);
    }
}
