<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Middleware;

use Closure;
use Illuminate\Http\Request;
use NetworkRailBusinessSystems\LaravelMoodle\MoodleUserProvider;

class MoodleToken
{
    public function handle(Request $request, Closure $next): mixed
    {
        // TODO FOR ENTRA TO CAHNGE
        //        if (! session()->has('moodle-token')) {
        //            auth()->logout();
        //
        //            return redirect('login');
        //        }

        // TODO FOR TEST USER CREATION
        $user = $request->user();

        if ($user !== null && $user->moodle_id === null) {
            $provider = new MoodleUserProvider;
            $provider->syncUser($user);
        }

        return $next($request);
    }
}
