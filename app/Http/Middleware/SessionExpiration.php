<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SessionExpiration
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::viaRemember()) {
            $lastActivity = session('last_activity');

            if ($lastActivity && Carbon::parse($lastActivity)->diffInMinutes(now()) > 60) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['message' => 'La sesión ha expirado. Por favor, inicia sesión nuevamente.']);
            }

            session(['last_activity' => now()]);
        }

        return $next($request);
    }
}
