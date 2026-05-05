<?php

use App\Http\Middleware\ActiveRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');

        $middleware->remove(\Illuminate\Http\Middleware\ValidatePathEncoding::class);

        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'active.role' => ActiveRoleMiddleware::class,
        ]);

        $middleware->appendToGroup('web', [
            \App\Http\Middleware\ActiveRoleMiddleware::class,
            \App\Http\Middleware\RecordActivity::class,
        ]);

        $middleware->prepend(\App\Http\Middleware\InstallerMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (\Throwable $e, \Illuminate\Http\Request $request) {
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $e->getStatusCode() === 403) {
                \Illuminate\Support\Facades\Log::error('403 Forbidden Triggered', [
                    'url' => $request->fullUrl(),
                    'user_id' => auth()->id(),
                    'active_role' => session('active_role'),
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => collect($e->getTrace())->take(10)->toArray(),
                ]);
            }
        });
    })->create();
