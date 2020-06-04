<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;
use NRBusinessSystems\LaraMoodle\Facade as LaraMoodle;

class UserTest extends TestCase
{
    public function test_search_users()
    {
        Http::fake([
            '*' => Http::response(MockResponses::userSearch(), 200)
        ]);

        session(['moodle-token' => 'ABC123']);

        $users = LaraMoodle::searchUsers('testuser');

        $this->assertNotNull($users);
        $this->assertEquals('testuser', $users->users[0]->username);
        $this->assertEquals('Test User', $users->users[0]->fullname);
    }
}
