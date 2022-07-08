<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

class UserTest extends TestCase
{
    public function test_search_users()
    {
        Http::fake([
            '*' => Http::response(MockResponses::userSearch(), 200),
        ]);

        session(['moodle-token' => 'ABC123']);

        $users = LaraMoodle::searchUsers('testuser');

        $this->assertNotNull($users);
        $this->assertEquals('testuser', $users->users[0]->username);
        $this->assertEquals('Test User', $users->users[0]->fullname);
    }
}
