<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Middleware;

use Closure;
use Illuminate\Http\Request;

class MoodleToken
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (! session()->has('moodle-token')) {
            auth()->logout();

            return redirect('login');
        }

        return $next($request);
    }
}
