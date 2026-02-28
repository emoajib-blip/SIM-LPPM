<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $user_id
 * @property int|null $institution_id
 * @property string|null $institution_name
 * @property string|null $academic_title
 * @property string|null $nidn
 * @property string|null $expertise_keywords
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Institution|null $institution
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class ReviewerProfile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'institution_id',
        'institution_name',
        'academic_title',
        'nidn',
        'expertise_keywords',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the institution that the reviewer belongs to.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
