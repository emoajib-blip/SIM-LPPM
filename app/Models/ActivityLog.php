<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'ip_address',
        'user_agent',
        'url',
        'method',
    ];

    /**
     * Get the user that owning the activity log.
     */
    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
