<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleException;

class MoodleUserProvider implements UserProvider
{
    private PendingRequest $http;

    private string $adminToken;

    private string $userModel;

    public function __construct()
    {
        $this->http = Http::withOptions([
            'base_uri' => config('laravel-moodle.base_url'),
        ]);

        $this->adminToken = config('laravel-moodle.admin_token');
        $this->userModel = config('laravel-moodle.user_model');
    }

    public function retrieveById(mixed $identifier): Model
    {
        return $this->userModel::findOrFail($identifier);
    }

    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return $this->userModel::query()->where('remember_token', '=', $token)->first();
    }

    public function updateRememberToken(Authenticatable $user, $token): void
    {
        $user->setRememberToken($token);
    }

    public function retrieveByCredentials(array $credentials): Model
    {
        return $this->userModel::firstOrNew([
            'username' => $credentials[config('laravel-moodle.login_attribute')],
        ]);
    }

    public function validateCredentials(Authenticatable|Model $user, array $credentials): bool
    {
        $attempt = $this->http
            ->asForm()
            ->post('/login/token.php?service=web_service', [
                'username' => $user->username,
                'password' => $credentials['password'],
            ])
            ->json();

        if (
            isset($attempt['error']) === false
            && isset($attempt['token']) === true
        ) {
            session(['moodle-token' => $attempt['token']]);
            $this->syncUser($user);

            return true;
        }

        return false;
    }

    public function syncUser(
        Authenticatable|Model $user,
        string $userKey = 'email',
        ?string $moodleKey = 'email'
    ): int {
        $moodleUser = $this->findMoodleUser(
            $moodleKey,
            $user->{$userKey}
        );

        if ($moodleUser === null) {
            $moodleUserId = $this->createMoodleUser($user);
        } else {
            $moodleUserId = (int) $moodleUser['id'];

            $this->updateMoodleUser(
                $moodleUserId,
                $user
            );
        }

        $user->moodle_id = $moodleUserId;
        $user->save();

        return $moodleUserId;
    }

    private function findMoodleUser(string $key, string $value): ?array
    {
        $response = $this->http
            ->asForm()
            ->post('/webservice/rest/server.php', [
                'wstoken' => $this->adminToken,
                'wsfunction' => 'core_user_get_users',
                'moodlewsrestformat' => 'json',
                'criteria' => [
                    [
                        'key' => $key,
                        'value' => $value,
                    ],
                ],
            ]);

        $data = $response->json();

        if ($response->successful() === false || isset($data['exception']) === true) {
            throw new MoodleException(
                $data['message'] ?? 'Unable to search Moodle users: ' . $response->body()
            );
        }

        return $data['users'][0] ?? null;
    }

    private function createMoodleUser(Authenticatable|Model $user): int
    {
        $response = $this->http
            ->asForm()
            ->post('/webservice/rest/server.php', [
                'wstoken' => $this->adminToken,
                'wsfunction' => 'core_user_create_users',
                'moodlewsrestformat' => 'json',
                'users' => [
                    [
                        'auth' => 'manual',
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'firstname' => $user->first_name,
                        'lastname' => $user->last_name,
                        'password' => 'A1!'.bin2hex(random_bytes(8)),
                        'username' => strtolower($user->username),
                    ],
                ],
            ]);

        $data = $response->json();

        if ($response->successful() === false  || isset($data['exception']) === true) {
            throw new MoodleException(
                $data['message'] ?? 'Unable to create Moodle user: '.$response->body()
            );
        }

        if (isset($data[0]['id']) === false) {
            throw new MoodleException(
                $data['message'] ?? 'Moodle did not return a user ID: ' . $response->body()
            );
        }

        return (int) $data[0]['id'];
    }

    private function updateMoodleUser(int $moodleUserId, Model $user): void
    {
        $response = $this->http
            ->asForm()
            ->post('/webservice/rest/server.php', [
                'wstoken' => $this->adminToken,
                'wsfunction' => 'core_user_update_users',
                'moodlewsrestformat' => 'json',

                'users' => [
                    [
                        'id' => $moodleUserId,
                        'city' => $user->location,
                        'department' => $user->business_area,
                        'description' => $user->title,
                        'email' => $user->email,
                        'firstname' => $user->first_name,
                        'lastname' => $user->last_name,
                        'username' => strtolower($user->username),
                    ],
                ],
            ]);

        $data = $response->json();

        if ($response->successful() === false || isset($data['exception']) === true) {
            throw new MoodleException(
                $data['message'] ?? 'Unable to update Moodle user: ' . $response->body()
            );
        }
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        //
    }
}
