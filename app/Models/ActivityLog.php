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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
