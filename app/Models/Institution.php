<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $name
 * @property string|null $short_name
 * @property string|null $code
 * @property string|null $type
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $lppm_head_name
 * @property string|null $lppm_head_id
 * @property string|null $lppm_head_user_id
 * @property bool $is_verified
 * @property-read \App\Models\User|null $lppmHeadUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faculty[] $faculties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StudyProgram[] $studyPrograms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Identity[] $identities
 */
class Institution extends Model
{
    /** @use HasFactory<\Database\Factories\InstitutionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'code',
        'type',
        'address',
        'phone',
        'email',
        'website',
        'lppm_head_name',
        'lppm_head_id',
        'lppm_head_user_id',
        'is_verified',
    ];

    /**
     * Get the user who is the head of LPPM for this institution.
     */
    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
    public function lppmHeadUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'lppm_head_user_id');
    }

    /**
     * Get all faculties for the institution.
     */
    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    /**
     * Get all study programs for the institution (through faculties).
     */
    public function studyPrograms(): HasManyThrough
    {
        return $this->hasManyThrough(StudyProgram::class, Faculty::class);
    }

    /**
     * Get all identities associated with the institution.
     */
    public function identities(): HasMany
    {
        return $this->hasMany(Identity::class);
    }
}
