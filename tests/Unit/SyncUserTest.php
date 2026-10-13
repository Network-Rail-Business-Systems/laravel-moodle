<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class SyncUserTest extends TestCase
{
    public function test_updates_existing_user(): void
    {
        Http::fake([
            '*' => Http::response(MockResponses::userSearch()),
        ]);

        $user = new User([
            'email' => 'test.user@fake.email',
            'name' => 'Test User',
            'moodle_id' => 2,
        ]);

        $moodleUserId = LaravelMoodle::syncUser($user);

        $this->assertDatabaseHas('users', [
            'email' => 'test.user@fake.email',
            'moodle_id' => $moodleUserId,
        ]);

        Http::assertSent(function ($request): bool {
            return $request['wsfunction'] === 'core_user_update_users'
                && (int) $request['users'][0]['id'] === 2;
        });
    }

    public function test_creates_user(): void
    {
        Http::fake([
            '*' => Http::sequence()
                ->push(MockResponses::emptyUserSearch())
                ->push(MockResponses::createUser()),
        ]);

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test.user.nonexistent@fake.email',
            'username' => 'testuser',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $moodleUserId = LaravelMoodle::syncUser($user);

        $this->assertSame(10, $moodleUserId);
    }

    public function test_throws_moodle_exception(): void
    {
        Http::fake([
            '*' => Http::sequence()
                ->push(MockResponses::emptyUserSearch())
                ->push([]),
        ]);

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test.user@fake.email',
            'username' => 'testuser',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);

        $this->expectException(MoodleException::class);
        $this->expectExceptionMessage('Moodle did not return a user ID.');

        LaravelMoodle::syncUser($user);
    }
}
