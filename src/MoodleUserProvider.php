<?php

namespace NRBusinessSystems\LaraMoodle;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Http;

class MoodleUserProvider implements UserProvider
{
    private $http;
    private $adminToken;

    public function __construct()
    {
        $this->http = Http::withOptions([
            'base_uri' => config('laramoodle.base_url')
        ]);

        $this->adminToken = config('laramoodle.admin_token');
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
        $data = $this->http->asForm()
            ->post(
                "/webservice/rest/server.php?wstoken={$this->adminToken}&wsfunction=core_user_get_users&moodlewsrestformat=json",
                [
                    'criteria' => [
                        [
                            'key' => config('laramoodle.login_attribute'),
                            'value' => $credentials[config('laramoodle.login_attribute')]
                        ]
                    ]
                ]
            )
            ->json();

        if (isset($data['users'][0])) {
            return $this->syncUser($data['users'][0]);
        }

        return new User;
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
            ->get("/login/token.php?username={$user->username}&password={$credentials['password']}&service=web_service")
            ->json();

        if (!isset($attempt['error']) && isset($attempt['token'])) {
            session(['moodle-token' => $attempt['token']]);
            return true;
        }

        return false;
    }

    /**
     * Syncs a users details from the provided moodle data
     *
     * @param array $data
     * @return mixed
     */
    public function syncUser(array $data)
    {
        return User::firstOrCreate(
            [
                'username' => $data['username']
            ],
            [
                'name' => $data['firstname'] . ' ' . $data['lastname'],
                'email' => $data['email']
            ]
        );
    }
}
