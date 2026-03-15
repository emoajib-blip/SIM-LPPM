<?php

namespace App\Models;

use App\Enums\ProposalStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $title
 * @property string $submitter_id
 * @property string|null $detailable_id
 * @property string|null $detailable_type
 * @property string|null $research_scheme_id
 * @property string|null $community_service_scheme_id
 * @property string|null $focus_area_id
 * @property string|null $theme_id
 * @property string|null $topic_id
 * @property string|null $national_priority_id
 * @property string|null $cluster_level1_id
 * @property string|null $cluster_level2_id
 * @property string|null $cluster_level3_id
 * @property float|null $sbk_value
 * @property int|null $duration_in_years
 * @property int|null $start_year
 * @property string|null $summary
 * @property string|null $asta_cita
 * @property \App\Enums\ProposalStatus $status
 * @property array|null $student_members
 * @property-read \App\Models\User $submitter
 * @property-read \Illuminate\Database\Eloquent\Model|\App\Models\Research|\App\Models\CommunityService $detailable
 * @property-read \App\Models\ResearchScheme|null $researchScheme
 * @property-read \App\Models\CommunityServiceScheme|null $communityServiceScheme
 * @property-read \App\Models\FocusArea|null $focusArea
 * @property-read \App\Models\Theme|null $theme
 * @property-read \App\Models\Topic|null $topic
 * @property-read \App\Models\NationalPriority|null $nationalPriority
 * @property-read \App\Models\ScienceCluster|null $clusterLevel1
 * @property-read \App\Models\ScienceCluster|null $clusterLevel2
 * @property-read \App\Models\ScienceCluster|null $clusterLevel3
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sdg[] $sdgs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MasterIku[] $targetedIkus
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProposalMonev[] $monevs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $teamMembers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProposalOutput[] $outputs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BudgetItem[] $budgetItems
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Partner[] $partners
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ActivitySchedule[] $activitySchedules
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ResearchStage[] $researchStages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProposalReviewer[] $reviewers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProgressReport[] $progressReports
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DailyNote[] $dailyNotes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProposalStatusLog[] $statusLogs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReviewLog[] $reviewLogs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProposalActivity[] $activities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DocumentSignature[] $signatures
 * @property-read \App\Models\User $user
 */
class Proposal extends Model
{
    /** @use HasFactory<\Database\Factories\ProposalFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    public ?string $notes = null;

    /**
     * The type of the auto-incrementing ID's primary key.
     */
    protected $keyType = 'string';

    /**
     * Indicates if the ID is auto-incrementing.
     */
    public $incrementing = false;

    protected $fillable = [
        'title',
        'submitter_id',
        'detailable_id',
        'detailable_type',
        'research_scheme_id',
        'community_service_scheme_id',
        'focus_area_id',
        'theme_id',
        'topic_id',
        'national_priority_id',
        'cluster_level1_id',
        'cluster_level2_id',
        'cluster_level3_id',
        'sbk_value',
        'duration_in_years',
        'start_year',
        'semester',
        'summary',
        'asta_cita',
        'status',
        'logbook_signed_at',
        'logbook_approved_at',
        'student_members',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sbk_value' => 'decimal:2',
            'duration_in_years' => 'integer',
            'status' => ProposalStatus::class,
            'logbook_signed_at' => 'datetime',
            'logbook_approved_at' => 'datetime',
            'student_members' => 'array',
        ];
    }

    /**
     * Get the SDGs for the proposal.
     */
    public function sdgs(): BelongsToMany
    {
        return $this->belongsToMany(Sdg::class, 'proposal_sdg');
    }

    /**
     * Get the targeted IKUs for the proposal.
     */
    public function targetedIkus(): BelongsToMany
    {
        return $this->belongsToMany(MasterIku::class, 'proposal_target_iku');
    }

    /**
     * Get all monev sessions for the proposal.
     */
    public function monevs(): HasMany
    {
        return $this->hasMany(ProposalMonev::class)->orderBy('monev_date', 'desc');
    }

    /**
     * Get the user who submitted the proposal.
     */
    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitter_id');
    }

    /**
     * Alias for submitter relationship.
     */
    public function user(): BelongsTo
    {
        return $this->submitter();
    }

    /**
     * Get the detailable model (Research or CommunityService).
     */
    public function detailable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the research scheme for the proposal.
     */
    public function researchScheme(): BelongsTo
    {
        return $this->belongsTo(ResearchScheme::class);
    }

    /**
     * Get the community service scheme for the proposal.
     */
    public function communityServiceScheme(): BelongsTo
    {
        return $this->belongsTo(CommunityServiceScheme::class);
    }

    /**
     * Get the focus area for the proposal.
     */
    public function focusArea(): BelongsTo
    {
        return $this->belongsTo(FocusArea::class);
    }

    /**
     * Get the theme for the proposal.
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Get the topic for the proposal.
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * Get the national priority for the proposal.
     */
    public function nationalPriority(): BelongsTo
    {
        return $this->belongsTo(NationalPriority::class);
    }

    /**
     * Get the level 1 science cluster for the proposal.
     */
    public function clusterLevel1(): BelongsTo
    {
        return $this->belongsTo(ScienceCluster::class, 'cluster_level1_id');
    }

    /**
     * Get the level 2 science cluster for the proposal.
     */
    public function clusterLevel2(): BelongsTo
    {
        return $this->belongsTo(ScienceCluster::class, 'cluster_level2_id');
    }

    /**
     * Get the level 3 science cluster for the proposal.
     */
    public function clusterLevel3(): BelongsTo
    {
        return $this->belongsTo(ScienceCluster::class, 'cluster_level3_id');
    }

    public function teamMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'proposal_user')
            ->orderByPivot('created_at', 'desc')
            ->withPivot('role', 'tasks', 'status')
            ->withTimestamps();
    }

    /**
     * Get all keywords for the proposal.
     */
    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class, 'proposal_keyword')
            ->withTimestamps();
    }

    /**
     * Get all outputs for the proposal.
     */
    public function outputs(): HasMany
    {
        return $this->hasMany(ProposalOutput::class);
    }

    /**
     * Get all budget items for the proposal.
     */
    public function budgetItems(): HasMany
    {
        return $this->hasMany(BudgetItem::class);
    }

    /**
     * Get all partners for the proposal.
     */
    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class, 'proposal_partner')
            ->withTimestamps();
    }

    /**
     * Get all activity schedules for the proposal.
     */
    public function activitySchedules(): HasMany
    {
        return $this->hasMany(ActivitySchedule::class);
    }

    /**
     * Get all research stages for the proposal.
     */
    public function researchStages(): HasMany
    {
        return $this->hasMany(ResearchStage::class);
    }

    /**
     * Get all reviewers for the proposal.
     */
    public function reviewers(): HasMany
    {
        return $this->hasMany(ProposalReviewer::class)->orderBy('round', 'desc')->orderBy('assigned_at', 'desc');
    }

    /**
     * Get all progress reports for the proposal.
     */
    public function progressReports(): HasMany
    {
        return $this->hasMany(ProgressReport::class);
    }

    /**
     * Get all daily notes for the proposal.
     */
    public function dailyNotes(): HasMany
    {
        return $this->hasMany(DailyNote::class);
    }

    /**
     * Get all status change logs for the proposal.
     */
    public function statusLogs(): HasMany
    {
        return $this->hasMany(ProposalStatusLog::class)->orderBy('at', 'desc');
    }

    /**
     * Get all review logs for the proposal.
     */
    public function reviewLogs(): HasMany
    {
        return $this->hasMany(ReviewLog::class)->orderBy('round', 'desc')->orderBy('completed_at', 'desc');
    }

    /**
     * Get all activities for the proposal.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(ProposalActivity::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get all digital signatures for the proposal.
     */
    public function signatures(): MorphMany
    {
        return $this->morphMany(DocumentSignature::class, 'document', 'document_type', 'document_id');
    }

    /**
     * Check if all team members have accepted the invitation.
     */
    public function allTeamMembersAccepted(): bool
    {
        $totalMembers = $this->teamMembers()->count();
        if ($totalMembers === 0) {
            return true;
        }

        $acceptedMembers = $this->teamMembers()
            ->wherePivot('status', 'accepted')
            ->count();

        return $totalMembers === $acceptedMembers;
    }

    /**
     * Check if all reviewers have completed their reviews.
     */
    public function allReviewsCompleted(): bool
    {
        $stats = $this->reviewers()
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as completed',
                [\App\Enums\ReviewStatus::COMPLETED])
            ->first();

        if (! $stats) {
            return false;
        }

        $total = (int) ($stats->total ?? 0);
        $completed = (int) ($stats->completed ?? 0);

        return $total > 0 && $total === $completed;
    }

    /**
     * Get pending team member invitations.
     */
    public function pendingTeamMembers()
    {
        return $this->teamMembers()
            ->wherePivot('status', 'pending');
    }

    /**
     * Get pending reviewer assignments.
     */
    public function pendingReviewers()
    {
        return $this->reviewers()
            ->whereIn('status', [
                \App\Enums\ReviewStatus::PENDING,
                \App\Enums\ReviewStatus::RE_REVIEW_REQUESTED,
            ]);
    }

    /**
     * Get all pending team members (anggota who haven't accepted).
     */
    public function getPendingTeamMembers()
    {
        return $this->teamMembers()
            ->wherePivot('status', '!=', 'accepted')
            ->get();
    }

    /**
     * Get all pending reviewers (who haven't completed their review).
     */
    public function getPendingReviewers()
    {
        return $this->reviewers()
            ->where('status', '!=', \App\Enums\ReviewStatus::COMPLETED)
            ->get();
    }

    /**
     * Check if proposal can be approved (all reviewers completed).
     */
    public function canBeApproved(): bool
    {
        return $this->allReviewsCompleted();
    }

    /**
     * Get all monev reviews (post-completion audits) for the proposal.
     */
    public function monevReviews(): HasMany
    {
        return $this->hasMany(MonevReview::class);
    }

    /**
     * Scope for academic year.
     */
    public function scopeForAcademicYear($query, string $year)
    {
        return $query->where('start_year', $year);
    }

    /**
     * Scope for semester.
     */
    public function scopeForSemester($query, string $semester)
    {
        return $query->where('semester', $semester);
    }
}
