<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            $currentTime = time();

            // Check if the last activity was more than 12 hours ago
            if ($lastActivity && ($currentTime - $lastActivity) > 43200) { // 43200 seconds = 12 hours
                Auth::logout(); // Log out the user
                return redirect()->route('home')->with('message', 'You have been logged out due to inactivity.');
            }

            // Update last activity time
            session(['lastActivityTime' => $currentTime]);
        }

        return $next($request);
    }
}