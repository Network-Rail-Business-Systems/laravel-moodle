<?php

namespace NetworkRailBusinessSystems\LaravelMoodle;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Http;

class MoodleUserProvider implements UserProvider
{
    private $http;
    private $adminToken;
    private $userModel;

    public function __construct()
    {
        $this->http = Http::withOptions([
            'base_uri' => config('laravel-moodle.base_url'),
        ]);

        $this->adminToken = config('laravel-moodle.admin_token');

        $this->userModel = config('laravel-moodle.user_model');
    }

    /**
     * Retrieve the user by their ID
     *
     * @param mixed $identifier
     * @return Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return User::findOrFail($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    /**
     * Retrieve the user from Moodle using the Admin token
     * If successful, sync the user from the database
     *
     * @param array $credentials
     * @return User|Authenticatable|mixed|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $data = $this->http
            ->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->adminToken}&wsfunction=core_user_get_users&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => config('laravel-moodle.login_attribute'),
                            'value' => $credentials[config('laravel-moodle.login_attribute')],
                        ],
                    ],
                ]
            )
            ->json();

        if (isset($data['users'][0])) {
            return $this->syncUser($data['users'][0]);
        }

        return new $this->userModel();
    }

    /**
     * Send a request to the moodle login endpoint to verify the credentials
     * If valid, store the returned token in the session and return true
     *
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $attempt = $this->http
            ->asForm()
            ->post('/login/token.php?service=web_service', [
                'username' => $user->username,
                'password' => $credentials['password'],
            ])
            ->json();

        if (!isset($attempt['error']) && isset($attempt['token'])) {
            session(['moodle-token' => $attempt['token']]);
            return true;
        }

        return false;
    }

    /**
     * Find or create a user
     * Syncs a users details from the provided moodle data
     *
     * @param array $data
     * @return mixed
     */
    public function syncUser(array $data)
    {
        $userSync = collect(config('laravel-moodle.sync_attributes'))
            ->map(function ($item) use ($data) {
                return $data[$item];
            })
            ->toArray();

        return $this->userModel::updateOrCreate(
            [
                'username' => $data['username'],
            ],
            $userSync
        );
    }
}
