<?php

namespace App\Livewire\Dashboard;

use App\Exports\ResearchProposalExport;
use App\Models\BudgetItem;
use App\Models\ProgressReport;
use App\Models\Proposal;
use App\Models\ProposalMonev;
use App\Models\ProposalReviewer;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
#[Layout('components.layouts.app', ['title' => 'Dashboard Admin', 'pageTitle' => 'Dashboard Utama', 'pageSubtitle' => 'Ikhtisar performa dan aktivitas LPPM'])]
class AdminDashboard extends Component
{
    public $user;

    public $roleName;

    public $stats = [];

    public $processStats = [];

    public $recentResearch = [];

    public $recentCommunityService = [];

    public $selectedYear;

    public $availableYears = [];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->roleName = active_role();
        $this->selectedYear = date('Y');
        $this->availableYears = $this->getAvailableYears();

        $this->loadAnalytics();
    }

    public function updatedSelectedYear(): void
    {
        $this->loadAnalytics();
    }

    public function exportResearch()
    {
        return Excel::download(
            new ResearchProposalExport($this->selectedYear),
            "research-proposals-{$this->selectedYear}.xlsx"
        );
    }

    private function getAvailableYears(): array
    {
        // Use start_year (tahun pelaksanaan) as filter basis, not created_at
        $years = Proposal::query()
            ->distinct()
            ->whereNotNull('start_year')
            ->orderBy('start_year', 'desc')
            ->pluck('start_year')
            ->map(fn ($y) => (string) $y)
            ->toArray();

        if (empty($years)) {
            $years = [(string) date('Y')];
        }

        return $years;
    }

    public function loadAnalytics(): void
    {
        $yearFilter = $this->selectedYear;

        // OPTIMIZED: Single aggregated query for all stats (replaces 9 separate count queries)
        $this->loadStats($yearFilter);

        // Load process monitoring stats (Review, Monev, Reporting)
        $this->loadProcessStats($yearFilter);

        // Load recent proposals
        $this->loadRecentProposals($yearFilter);
    }

    /**
     * Load all stats in a single aggregated query.
     * Replaces 9 separate count queries with 1 grouped query.
     */
    private function loadStats(string $yearFilter): void
    {
        // Filter by start_year (tahun pelaksanaan kegiatan), bukan created_at
        $statsRaw = Proposal::query()
            ->where('start_year', $yearFilter)
            ->select([
                'detailable_type',
                'status',
                DB::raw('COUNT(*) as count'),
            ])
            ->groupBy('detailable_type', 'status')
            ->get();

        $this->stats = $this->transformStats($statsRaw);
    }

    /**
     * Transform raw stats query result into stats array.
     */
    private function transformStats(Collection $raw): array
    {
        $research = $raw->filter(fn ($r) => str_contains($r->detailable_type, 'Research'));
        $communityService = $raw->filter(fn ($r) => str_contains($r->detailable_type, 'CommunityService'));

        // Get total dosen count (single query, cached)
        $totalDosen = User::role('dosen')->count();

        // Budget from budget_items (sbk_value is always null/0, real budget lives in budget_items)
        // Filter by start_year (tahun pelaksanaan) — konsisten dengan filter utama
        $researchBudget = (int) BudgetItem::query()
            ->whereHas('proposal', fn ($q) => $q
                ->where('detailable_type', 'App\Models\Research')
                ->where('start_year', $this->selectedYear)
                ->whereIn('status', ['approved', 'completed'])
            )->sum('total_price');

        $pkmBudget = (int) BudgetItem::query()
            ->whereHas('proposal', fn ($q) => $q
                ->where('detailable_type', 'App\Models\CommunityService')
                ->where('start_year', $this->selectedYear)
                ->whereIn('status', ['approved', 'completed'])
            )->sum('total_price');

        // FIX ENUM BUG: Laravel Collection whereIn compares by ==, but status
        // is a PHP 8.1 Enum. Must use ->value to get the string for comparison.
        $researchApproved = $research->filter(fn ($r) => in_array($r->status?->value, ['approved', 'completed']))->sum('count');
        $pkmApproved = $communityService->filter(fn ($r) => in_array($r->status?->value, ['approved', 'completed']))->sum('count');
        $researchCompleted = $research->filter(fn ($r) => $r->status?->value === 'completed')->sum('count');
        $pkmCompleted = $communityService->filter(fn ($r) => $r->status?->value === 'completed')->sum('count');

        return [
            'total_research' => $research->sum('count'),
            'total_community_service' => $communityService->sum('count'),
            'research_pending' => $research->filter(fn ($r) => $r->status?->value === 'submitted')->sum('count'),
            'community_service_pending' => $communityService->filter(fn ($r) => $r->status?->value === 'submitted')->sum('count'),
            'research_approved' => $researchApproved,
            'community_service_approved' => $pkmApproved,
            'research_completed' => $researchCompleted,
            'community_service_completed' => $pkmCompleted,
            'research_rejected' => $research->filter(fn ($r) => $r->status?->value === 'rejected')->sum('count'),
            'community_service_rejected' => $communityService->filter(fn ($r) => $r->status?->value === 'rejected')->sum('count'),
            'research_budget' => $researchBudget,
            'pkm_budget' => $pkmBudget,
            'total_dosen' => $totalDosen,
        ];
    }

    private function loadProcessStats(string $yearFilter): void
    {
        // 1. Review Status
        $reviewers = ProposalReviewer::whereHas('proposal', function ($query) use ($yearFilter) {
            $query->where('start_year', $yearFilter);
        })->get();

        $totalReview = $reviewers->count();
        $completedReview = $reviewers->filter(fn ($r) => $r->status?->value === 'completed' || $r->status === 'completed')->count();

        // Proposals that are funded (approved/completed) require Monev and Reports
        $activeProposals = Proposal::where('start_year', $yearFilter)
            ->whereIn('status', ['approved', 'completed'])
            ->get();
        $activeProposalIds = $activeProposals->pluck('id');

        // 2. Monev Status
        $totalMonev = $activeProposals->count();
        // Completed Monev corresponds to the number of distinct proposals that have a monev record
        $completedMonev = ProposalMonev::whereIn('proposal_id', $activeProposalIds)->distinct('proposal_id')->count();

        // 3. Reporting Status (Progress & Final Report)
        $totalReports = $activeProposals->count();
        // A report is considered submitted/completed if it exists and has one of the tracking statuses
        $submittedReports = ProgressReport::whereIn('proposal_id', $activeProposalIds)
            ->whereIn('status', ['submitted', 'approved', 'revised', 'completed'])
            ->distinct('proposal_id')
            ->count();

        $this->processStats = [
            'review_total' => $totalReview,
            'review_completed' => $completedReview,
            'review_progress' => $totalReview > 0 ? ($completedReview / $totalReview) * 100 : 0,

            'monev_total' => $totalMonev,
            'monev_completed' => $completedMonev,
            'monev_progress' => $totalMonev > 0 ? ($completedMonev / $totalMonev) * 100 : 0,

            'report_total' => $totalReports,
            'report_submitted' => $submittedReports,
            'report_progress' => $totalReports > 0 ? ($submittedReports / $totalReports) * 100 : 0,
        ];
    }

    /**
     * Load recent proposals in a single query.
     */
    private function loadRecentProposals(string $yearFilter): void
    {
        // Filter by start_year (tahun pelaksanaan) — konsisten dengan KPI cards
        $recentProposals = Proposal::with(['submitter'])
            ->where('start_year', $yearFilter)
            ->latest()
            ->limit(20)
            ->get();

        $this->recentResearch = $recentProposals
            ->filter(fn ($p) => str_contains($p->detailable_type, 'Research'))
            ->take(10)
            ->values();

        $this->recentCommunityService = $recentProposals
            ->filter(fn ($p) => str_contains($p->detailable_type, 'CommunityService'))
            ->take(10)
            ->values();
    }

    public function render()
    {
        return view('livewire.dashboard.admin-dashboard');
    }
}
