<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\MoodleUserProvider;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\User;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

class UserProviderTest extends TestCase
{
    public function test_retrieve_by_credentials()
    {
        Http::fake([
            '*' => Http::response(MockResponses::userSearch(), 200)
        ]);

        $userProvider = new MoodleUserProvider();

        $user = $userProvider->retrieveByCredentials(['email' => 'test.user@fake.email', 'password' => 'secret']);

        $this->assertEquals('testuser', $user->username);
        $this->assertEquals('test.user@fake.email', $user->email);
        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'test.user@fake.email',
            'name' => 'Test User'
        ]);
    }

    public function test_validate_credentials_success()
    {
        Http::fake([
            '*' => Http::response(MockResponses::loginSuccess(), 200)
        ]);

        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test.user@fake.email'
        ]);

        $userProvider = new MoodleUserProvider();

        $this->assertTrue($userProvider->validateCredentials(
            $user,
            ['email' => 'test.user@fake.email', 'password' => 'secret']
        ));
    }

    public function test_validate_credentials_failure()
    {
        Http::fake([
            '*' => Http::response(MockResponses::loginFailure(), 200)
        ]);

        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test.user@fake.email'
        ]);

        $userProvider = new MoodleUserProvider();

        $this->assertFalse($userProvider->validateCredentials(
            $user,
            ['email' => 'test.user@fake.email', 'password' => 'secret']
        ));
    }
}
