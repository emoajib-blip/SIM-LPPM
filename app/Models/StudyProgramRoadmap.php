<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyProgramRoadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_program_id',
        'faculty_roadmap_id',
        'title',
        'period_start',
        'period_end',
        'vision',
        'research_tree',
        'cpl_alignment',
        'tkt_target_min',
        'tkt_target_max',
        'is_active',
    ];

    protected $casts = [
        'research_tree' => 'array',
        'is_active' => 'boolean',
    ];

    public function studyProgram(): BelongsTo
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function facultyRoadmap(): BelongsTo
    {
        return $this->belongsTo(FacultyRoadmap::class);
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
