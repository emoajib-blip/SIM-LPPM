<?php

namespace App\Models;

use App\Enums\ReviewStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasUuids;

    protected $casts = [
        'mfa_enabled_at' => 'datetime',
        'security_metadata' => 'array',
        'status' => ReviewStatus::class,
    ];

    /**
     * PHP 8.4 Property Hooks
     * Mengolah status MFA secara reaktif di level properti
     */
    public string $mfa_status {
        get => $this->mfa_enabled_at
            ? "Protected (Enabled at: {$this->mfa_enabled_at->format('d M Y')})"
            : 'Vulnerable (MFA Disabled)';
    }

    public bool $is_session_expired {
        get => $this->last_login_at?->addMinutes(120)->isPast() ?? true;
    }
}
