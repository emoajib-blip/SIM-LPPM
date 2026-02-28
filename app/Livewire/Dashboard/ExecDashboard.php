<?php

namespace App\Livewire\Dashboard;

use App\Models\Proposal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
#[Layout('components.layouts.app', ['title' => 'Dashboard Eksekutif', 'pageTitle' => 'Dashboard Strategis', 'pageSubtitle' => 'Ikhtisar capaian dan tren penelitian ditingkat institusi'])]
class ExecDashboard extends Component
{
    public $user;

    public $roleName;

    public $stats = [];

    public $recentResearch = [];

    public $recentCommunityService = [];

    public $selectedYear;

    public $selectedSemester = 'all';

    public $availableYears = [];

    public $periodicSummary = [];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->roleName = active_role();
        $this->selectedYear = (int) date('Y');
        $this->availableYears = $this->getAvailableYears();

        $this->loadAnalytics();
    }

    public function updatedSelectedYear(): void
    {
        $this->loadAnalytics();
    }

    public function exportIkuPdf(): void
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $this->dispatch('download-file', url: route('admin.iku.export-pdf', ['period' => $this->selectedYear]));
    }

    public function exportIkuExcel(): void
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $this->dispatch('download-file', url: route('admin.iku.export-excel', ['period' => $this->selectedYear]));
    }

    public function updatedSelectedSemester(): void
    {
        $this->loadAnalytics();
    }

    private function getAvailableYears(): array
    {
        $years = Proposal::select(DB::raw(sql_year().' as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        if (empty($years)) {
            $years = [date('Y')];
        }

        return $years;
    }

    public function loadAnalytics(): void
    {
        $yearFilter = $this->selectedYear;
        $semesterFilter = $this->selectedSemester;
        $facultyId = $this->roleName === 'dekan' ? $this->user->identity?->faculty_id : null;

        // OPTIMIZED: Single aggregated query for all stats
        $this->loadStats($yearFilter, $semesterFilter, $facultyId);

        // Load recent proposals
        $this->loadRecentProposals($yearFilter, $semesterFilter, $facultyId);

        // Load periodic summary with optimized queries
        $this->periodicSummary = $this->getPeriodicSummary($facultyId);
    }

    /**
     * Build base query with filters applied.
     */
    private function buildBaseQuery(int $yearFilter, string $semesterFilter, ?int $facultyId)
    {
        $query = Proposal::whereYear('created_at', $yearFilter);

        if ($semesterFilter !== 'all') {
            if ($semesterFilter === 'ganjil') {
                $query->where(function ($q) {
                    $q->whereMonth('created_at', '>=', 9)
                        ->orWhereMonth('created_at', '<=', 2);
                });
            } elseif ($semesterFilter === 'genap') {
                $query->whereMonth('created_at', '>=', 3)->whereMonth('created_at', '<=', 8);
            }
        }

        if ($facultyId) {
            $query->whereHas('submitter.identity', function ($q) use ($facultyId) {
                $q->where('faculty_id', $facultyId);
            });
        }

        return $query;
    }

    /**
     * Load all stats in a single aggregated query.
     */
    private function loadStats(int $yearFilter, string $semesterFilter, ?int $facultyId): void
    {
        $query = $this->buildBaseQuery($yearFilter, $semesterFilter, $facultyId);

        $statsRaw = (clone $query)
            ->select([
                'detailable_type',
                'status',
                DB::raw('COUNT(*) as count'),
            ])
            ->groupBy('detailable_type', 'status')
            ->get();

        $this->stats = $this->transformStats($statsRaw, $facultyId);
    }

    /**
     * Transform raw stats query result into stats array.
     */
    private function transformStats(Collection $raw, ?int $facultyId): array
    {
        $research = $raw->filter(fn ($r) => str_contains($r->detailable_type, 'Research'));
        $communityService = $raw->filter(fn ($r) => str_contains($r->detailable_type, 'CommunityService'));

        return [
            'total_research' => $research->sum('count'),
            'total_community_service' => $communityService->sum('count'),
            // Vetted by AI - Manual Review Required by Senior Engineer/Manager
            'research_approved' => $research->filter(fn ($r) => in_array($r->status->value, ['approved', 'completed']))->sum('count'),
            'community_service_approved' => $communityService->filter(fn ($r) => in_array($r->status->value, ['approved', 'completed']))->sum('count'),
            'faculty_name' => $facultyId ? $this->user->identity?->faculty?->name : null,
        ];
    }

    /**
     * Load recent proposals in a single query.
     */
    private function loadRecentProposals(int $yearFilter, string $semesterFilter, ?int $facultyId): void
    {
        $query = $this->buildBaseQuery($yearFilter, $semesterFilter, $facultyId);

        $recentProposals = (clone $query)
            ->with(['submitter'])
            ->whereIn('status', ['approved', 'completed'])
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

    /**
     * Get periodic summary with optimized queries.
     * Uses single query per period instead of multiple.
     */
    private function getPeriodicSummary(?int $facultyId): array
    {
        $currentYear = (int) date('Y');
        $summary = [];

        for ($year = $currentYear; $year >= $currentYear - 4; $year--) {
            foreach (['genap', 'ganjil'] as $semester) {
                $query = Proposal::whereYear('created_at', $year);

                if ($semester === 'ganjil') {
                    $query->where(function ($q) {
                        $q->whereMonth('created_at', '>=', 9)
                            ->orWhereMonth('created_at', '<=', 2);
                    });
                } else {
                    $query->whereMonth('created_at', '>=', 3)->whereMonth('created_at', '<=', 8);
                }

                if ($facultyId) {
                    $query->whereHas('submitter.identity', function ($q) use ($facultyId) {
                        $q->where('faculty_id', $facultyId);
                    });
                }

                $data = (clone $query)->select('detailable_type', 'status', DB::raw('count(*) as count'))
                    ->groupBy('detailable_type', 'status')
                    ->get();

                $researchTotal = $data->filter(fn ($d) => str_contains($d->detailable_type, 'Research'))->sum('count');
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                $researchApproved = $data->filter(fn ($d) => str_contains($d->detailable_type, 'Research') && in_array($d->status->value, ['approved', 'completed']))->sum('count');

                $pkmTotal = $data->filter(fn ($d) => str_contains($d->detailable_type, 'CommunityService'))->sum('count');
                $pkmApproved = $data->filter(fn ($d) => str_contains($d->detailable_type, 'CommunityService') && in_array($d->status->value, ['approved', 'completed']))->sum('count');

                if ($researchTotal > 0 || $pkmTotal > 0) {
                    $summary[] = [
                        'year' => $year,
                        'semester' => ucfirst($semester),
                        'research_total' => $researchTotal,
                        'research_approved' => $researchApproved,
                        'pkm_total' => $pkmTotal,
                        'pkm_approved' => $pkmApproved,
                    ];
                }
            }
        }

        return $summary;
    }

    public function render()
    {
        return view('livewire.dashboard.exec-dashboard');
    }
}
