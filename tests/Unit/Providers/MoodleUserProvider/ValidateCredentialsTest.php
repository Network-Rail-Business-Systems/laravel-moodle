<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit\Providers\MoodleUserProvider;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\User;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class ValidateCredentialsTest extends TestCase
{
    protected array $credentials = [
        'email' => 'test.user@fake.email',
        'password' => 'secret',
    ];

    protected MoodleUserProvider $provider;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test.user@fake.email',
        ]);
    }

    public function testTrueOnSuccess(): void
    {
        $this->assertTrue(
            $this->makeCheck(MockResponses::loginSuccess())
        );
    }

    public function testFalseOnFailure(): void
    {
        $this->assertFalse(
            $this->makeCheck(MockResponses::loginFailure())
        );
    }

    protected function makeCheck(array $loginResponse): bool
    {
        Http::fake([
            'http://moodle.test/login/*' => Http::response($loginResponse),
            'http://moodle.test/webservice/*' => Http::response(MockResponses::userSearch()),
        ]);

        $this->provider = new MoodleUserProvider();

        return $this->provider->validateCredentials($this->user, $this->credentials);
    }
}
