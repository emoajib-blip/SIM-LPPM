<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UserActivityListener
{
    /**
     * Handle user login events.
     */
    public function handleLogin($event): void
    {
        ActivityLog::create([
            'user_id' => $event->user->id,
            'activity' => 'login',
            'description' => 'User logged in',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $event->user->update(['last_active_at' => now()]);
    }

    /**
     * Handle user logout events.
     */
    public function handleLogout($event): void
    {
        if ($event->user) {
            ActivityLog::create([
                'user_id' => $event->user->id,
                'activity' => 'logout',
                'description' => 'User logged out',
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        }
    }

    /**
     * Handle failed login attempts.
     */
    public function handleFailed($event): void
    {
        ActivityLog::create([
            'user_id' => $event->user?->id,
            'activity' => 'login_failed',
            'description' => 'Gagal login. Email/Username: '.($event->credentials['email'] ?? ($event->credentials['username'] ?? 'unknown')),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe($events): array
    {
        return [
            Login::class => 'handleLogin',
            Logout::class => 'handleLogout',
            Failed::class => 'handleFailed',
        ];
    }
}
