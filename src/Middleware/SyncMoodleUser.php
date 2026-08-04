<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Middleware;

use Closure;
use Illuminate\Http\Request;
use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;

class SyncMoodleUser
{
    public function handle(Request $request, Closure $next): mixed
    {
        $user = $request->user();

        if ($user !== null && $user->moodle_id === null) {
            $provider = new MoodleUserProvider();
            $provider->syncUser($user);
        }

        return $next($request);
    }
}
