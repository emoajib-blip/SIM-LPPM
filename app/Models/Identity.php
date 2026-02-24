<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Identity extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_id',
        'user_id',
        'sinta_id',
        'scopus_id',
        'google_scholar_id',
        'wos_id',
        'type',
        'address',
        'birthdate',
        'birthplace',
        'institution_id',
        'institution_name',
        'study_program_id',
        'faculty_id',
        'profile_picture',
        // Academic Profile
        'last_education',
        'functional_position',
        'title_prefix',
        'title_suffix',
        // SINTA Scores
        'sinta_score_v2_overall',
        'sinta_score_v2_3yr',
        'sinta_score_v3_overall',
        'sinta_score_v3_3yr',
        'affil_score_v3_overall',
        'affil_score_v3_3yr',
        // Scopus
        'scopus_documents',
        'scopus_citations',
        'scopus_cited_documents',
        'scopus_h_index',
        'scopus_g_index',
        'scopus_i10_index',
        // Google Scholar
        'gs_documents',
        'gs_citations',
        'gs_cited_documents',
        'gs_h_index',
        'gs_g_index',
        'gs_i10_index',
        // WoS
        'wos_documents',
        'wos_citations',
        'wos_cited_documents',
        'wos_h_index',
        'wos_g_index',
        'wos_i10_index',
        // Garuda
        'garuda_documents',
        'garuda_citations',
        'garuda_cited_documents',
        // Status
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birthdate' => 'date',
        ];
    }

    /**
     * Get the user that owns the identity.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the institution that the identity belongs to.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * Get the study program that the identity belongs to.
     */
    public function studyProgram(): BelongsTo
    {
        return $this->belongsTo(StudyProgram::class);
    }

    /**
     * Get the faculty that the identity belongs to.
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Get the official SINTA profile URL.
     */
    public function getSintaUrl(): ?string
    {
        if (! $this->sinta_id) {
            return null;
        }

        return "https://sinta.kemdiktisaintek.go.id/authors/profile/{$this->sinta_id}";
    }

    /**
     * Get the official Scopus profile URL.
     */
    public function getScopusUrl(): ?string
    {
        if (! $this->scopus_id) {
            return null;
        }

        return "https://www.scopus.com/authid/detail.uri?authorId={$this->scopus_id}";
    }

    /**
     * Get the official Google Scholar profile URL.
     */
    public function getGoogleScholarUrl(): ?string
    {
        if (! $this->google_scholar_id) {
            return null;
        }

        return "https://scholar.google.com/citations?user={$this->google_scholar_id}";
    }
}
