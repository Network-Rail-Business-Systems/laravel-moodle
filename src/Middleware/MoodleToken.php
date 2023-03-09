<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Middleware;

use Closure;

class MoodleToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! session()->has('moodle-token')) {
            auth()->logout();

            return redirect('login');
        }

        return $next($request);
    }
}
