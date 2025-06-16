<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (!Session::has('admin_id')) {
            return redirect()->route('login.tampil'); // Redirect to login if not authenticated
        }

        return $next($request);
    }
}