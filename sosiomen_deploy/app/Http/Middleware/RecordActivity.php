<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check()) {
            $user = auth()->user();

            // Update last_active_at
            $user->update([
                'last_active_at' => now(),
            ]);

            // Record significant activities (ignore assets, livewire messages, etc. if needed)
            // For now, record all GET requests as "page_view"
            if ($request->isMethod('GET') && ! $request->expectsJson() && ! str_contains($request->url(), '/livewire/')) {
                \App\Models\ActivityLog::create([
                    'user_id' => $user->id,
                    'activity' => 'page_view',
                    'description' => 'Membuka halaman',
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                ]);
            }
        }

        return $response;
    }
}
