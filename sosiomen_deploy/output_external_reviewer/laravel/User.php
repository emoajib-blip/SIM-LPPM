<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasUuids, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'institution_id', 'is_external', 'mfa_enabled_at'];

    /**
     * PHP 8.4 Property Hooks for Security Metadata
     * Menjamin data sensitif tidak terekspos secara mentah ke Livewire
     */
    public string $mfa_status {
        get => $this->mfa_enabled_at ? 'Secure Session' : 'Unsecured';
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'mfa_enabled_at' => 'datetime',
            'is_external' => 'boolean',
            'security_metadata' => 'array',
        ];
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
