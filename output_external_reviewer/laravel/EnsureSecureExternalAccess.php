<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSecureExternalAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->is_external) {
            // 1. Check MFA
            if (! $user->mfa_enabled_at) {
                return redirect()->route('mfa.setup');
            }

            // 2. Check Session Lifetime (Zero Trust)
            $sessionDuration = now()->diffInMinutes($request->session()->get('login_at'));
            if ($sessionDuration > 120) { // 2 Hours
                Auth::logout();

                return redirect()->route('login')->with('error', 'Session expired for security.');
            }
        }

        return $next($request);
    }
}
