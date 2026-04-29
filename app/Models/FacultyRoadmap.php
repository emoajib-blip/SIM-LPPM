<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FacultyRoadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'title',
        'period_start',
        'period_end',
        'vision',
        'strategic_themes',
        'focus_area_ids',
        'document_url',
        'is_active',
    ];

    protected $casts = [
        'strategic_themes' => 'array',
        'focus_area_ids' => 'array',
        'is_active' => 'boolean',
    ];

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function studyProgramRoadmaps(): HasMany
    {
        return $this->hasMany(StudyProgramRoadmap::class);
    }
}
