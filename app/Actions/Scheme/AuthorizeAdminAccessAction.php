<?php

namespace App\Actions\Scheme;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class AuthorizeAdminAccessAction
{
    /**
     * Authorize access based on role AND specific active session attributes (Zero Trust).
     *
     * @throws AuthorizationException
     */
    public function execute(string $permission = 'manage-master-data'): void
    {
        $user = Auth::user();

        if (! $user) {
            throw new AuthorizationException('Unauthenticated.');
        }

        // 1. Check if user has the actual permission (RBAC)
        if (! $user->can($permission)) {
            throw new AuthorizationException("Anda tidak memiliki izin ($permission) untuk mengakses fitur ini.");
        }

        // 2. Strict ABAC: Verify active role matches the capability (Contextual check)
        // In the spec: "tidak hanya mengecek Role ID, tetapi juga memverifikasi izin spesifik... dan konteks"
        $activeRole = session('active_role');

        $allowedRoles = ['admin lppm', 'kepala lppm'];

        if (! in_array($activeRole, $allowedRoles)) {
            throw new AuthorizationException("Akses ditolak: Peran aktif Anda ($activeRole) tidak berwenang mengelola data ini.");
        }
    }
}
