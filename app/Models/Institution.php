<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function lppmHeadUser()
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
    public function studyPrograms(): HasMany
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
