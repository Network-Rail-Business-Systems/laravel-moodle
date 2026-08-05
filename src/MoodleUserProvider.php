<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

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

    public function syncUser(Authenticatable|Model $user, string $userKey = 'username', string $moodleKey = null): void
    {
        $data = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->adminToken}&wsfunction=core_user_get_users&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => $moodleKey ?? config('laravel-moodle.login_attribute'),
                            'value' => $user->$userKey,
                        ],
                    ],
                ]
            )
            ->json()['users'][0];

        $config = new Collection(config('laravel-moodle.sync_attributes'));
        $config->each(function ($item, $key) use ($data, $user) {
            $user->$key = $data[$item] ?? null;
        });

        $user->save();
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        //
    }
}
