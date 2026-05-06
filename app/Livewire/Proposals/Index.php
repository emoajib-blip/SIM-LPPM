<?php

namespace App\Livewire\Proposals;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property-read array $statusStats
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class Index extends Component
{
    public string $statusFilter = 'all';

    /**
     * Update the active status filter.
     */
    public function setStatusFilter(string $status): void
    {
        if (! Arr::has($this->statusStats, $status)) {
            return;
        }

        $this->statusFilter = $status;
    }

    /**
     * Render the component view.
     */
    public function render(): View
    {
        return view('livewire.proposals.index', [
            'statusOptions' => $this->formattedStatusOptions(),
            'proposals' => $this->filteredProposals(),
        ]);
    }

    /**
     * Filter proposals according to the selected status.
     */
    protected function filteredProposals(): array
    {
        return collect($this->seedProposals())
            ->when($this->statusFilter !== 'all', fn ($items) => $items->where('status', $this->statusFilter))
            ->map(function (array $proposal): array {
                $status = $proposal['status'];

                return [
                    ...$proposal,
                    'status_label' => Str::title(str_replace('_', ' ', $status)),
                    'status_badge' => $this->statusBadges()[$status] ?? 'badge bg-secondary',
                ];
            })
            ->values()
            ->all();
    }

    /**
     * Build the status summary used by the filter buttons.
     */
    protected function formattedStatusOptions(): array
    {
        return collect($this->statusStats)
            ->map(fn (int $count, string $key) => [
                'key' => $key,
                'label' => $this->statusLabels()[$key] ?? Str::title($key),
                'count' => $count,
            ])
            ->values()
            ->all();
    }

    /**
     * Cached summary of proposals per status.
     */
    protected function getStatusStatsProperty(): array
    {
        $counts = [
            'all' => 0,
            'SUBMITTED' => 0,
            'revisi' => 0,
            'APPROVED' => 0,
            'REJECTED' => 0,
        ];

        foreach ($this->seedProposals() as $proposal) {
            $counts['all']++;
            $counts[$proposal['status']]++;
        }

        return $counts;
    }

    /**
     * Example proposal data until persistence is wired up.
     */
    protected function seedProposals(): array
    {
        return [
            [
                'title' => 'Pengembangan Sistem Informasi Penelitian Terintegrasi',
                'owner' => 'Dr. Lina Hartati',
                'status' => 'SUBMITTED',
                'submitted_at' => '2025-09-02',
            ],
            [
                'title' => 'Analisis Dampak Program Pengabdian Masyarakat Desa Tani',
                'owner' => 'Prof. Suryo Pramono',
                'status' => 'revisi',
                'submitted_at' => '2025-08-28',
            ],
            [
                'title' => 'Optimalisasi Energi Terbarukan di Kampus Hijau',
                'owner' => 'Dr. Maya Anggraini',
                'status' => 'APPROVED',
                'submitted_at' => '2025-07-19',
            ],
            [
                'title' => 'Model Evaluasi Kinerja Reviewer Internal',
                'owner' => 'Dr. Randi Nugraha',
                'status' => 'REJECTED',
                'submitted_at' => '2025-07-05',
            ],
        ];
    }

    protected function statusLabels(): array
    {
        return [
            'all' => __('Semua'),
            'SUBMITTED' => __('Terkirim'),
            'revisi' => __('Perlu Revisi'),
            'APPROVED' => __('Disetujui'),
            'REJECTED' => __('Ditolak'),
        ];
    }

    protected function statusBadges(): array
    {
        return [
            'SUBMITTED' => 'blue',
            'revisi' => 'yellow',
            'APPROVED' => 'green',
            'REJECTED' => 'red',
        ];
    }
}
