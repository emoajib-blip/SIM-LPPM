<?php

namespace App\Listeners;

class UserActivityListener
{
    /**
     * Handle user login events.
     */
    public function handleLogin($event): void
    {
        \App\Models\ActivityLog::create([
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
            \App\Models\ActivityLog::create([
                'user_id' => $event->user->id,
                'activity' => 'logout',
                'description' => 'User logged out',
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe($events): array
    {
        return [
            \Illuminate\Auth\Events\Login::class => 'handleLogin',
            \Illuminate\Auth\Events\Logout::class => 'handleLogout',
        ];
    }
}
