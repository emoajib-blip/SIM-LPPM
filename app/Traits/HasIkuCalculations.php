<?php

namespace App\Traits;

use App\Models\AdditionalOutput;
use App\Models\Identity;
use App\Models\MandatoryOutput;
use App\Models\MasterIku;
use App\Models\Proposal;
use App\Models\User;

trait HasIkuCalculations
{
    /**
     * Get all IKU metrics for a given period.
     */
    public function getIkuMetrics(string $period): array
    {
        return [
            'iku4' => $this->calculateIku4($period),
            'iku5' => $this->calculateIku5($period),
            'iku6' => $this->calculateIku6($period),
            'iku7' => $this->calculateIku7($period),
            'iku8' => $this->calculateIku8($period),
        ];
    }

    /**
     * Get detailed data for a specific IKU metric.
     */
    public function getIkuDetails(string $ikuCode, string $period, string $search = ''): array
    {
        return match (strtoupper($ikuCode)) {
            'IKU4' => $this->getIku4Details($period, $search),
            'IKU5' => $this->getIku5Details($period, $search),
            'IKU6' => $this->getIku6Details($period, $search),
            'IKU7' => $this->getIku7Details($period, $search),
            'IKU8' => $this->getIku8Details($period, $search),
            default => [],
        };
    }

    protected function calculateIku4(string $period): array
    {
        $target = MasterIku::where('code', 'IKU-04')->value('target_percentage') ?? 15;
        $totalLecturers = Identity::where('type', 'dosen')->count();
        $lecturersWithRecognition = Identity::where('type', 'dosen')
            ->where(function ($q) {
                $q->whereNotNull('scopus_id')
                    ->orWhereNotNull('wos_id')
                    ->orWhereNotNull('sinta_id');
            })->count();

        $percentage = $totalLecturers > 0 ? ($lecturersWithRecognition / $totalLecturers) * 100 : 0;

        return [
            'code' => 'IKU-04',
            'name' => 'Rekognisi Internasional',
            'description' => "$lecturersWithRecognition dari $totalLecturers dosen memiliki ID Rekognisi (Scopus/SINTA).",
            'achievement' => $percentage,
            'target' => $target,
        ];
    }

    protected function calculateIku5(string $period): array
    {
        $target = MasterIku::where('code', 'IKU-05')->value('target_percentage') ?? 20;
        $totalProposals = Proposal::where('start_year', $period)->count();

        $proposalsWithPartners = Proposal::where('start_year', $period)
            ->with('partners')
            ->whereHas('partners')
            ->get();

        $currentWeight = 0;
        foreach ($proposalsWithPartners as $proposal) {
            $maxWeight = 0;
            foreach ($proposal->partners as $partner) {
                $partnerWeight = (strtolower($partner->country) !== 'indonesia' && ! empty($partner->country)) ? 1.5 : 1.0;
                $maxWeight = max($maxWeight, $partnerWeight);
            }
            $currentWeight += $maxWeight;
        }

        $percentage = $totalProposals > 0 ? ($currentWeight / $totalProposals) * 100 : 0;

        return [
            'code' => 'IKU-05',
            'name' => 'Kerjasama & Hilirisasi',
            'description' => $proposalsWithPartners->count().' kegiatan memiliki mitra dengan total bobot '.round($currentWeight, 2)." dari target dasar $totalProposals.",
            'achievement' => $percentage,
            'target' => $target,
        ];
    }

    protected function calculateIku6(string $period): array
    {
        $target = MasterIku::where('code', 'IKU-06')->value('target_percentage') ?? 20;
        $mandatoryQuery = MandatoryOutput::whereHas('progressReport.proposal', fn ($q) => $q->where('start_year', $period))
            ->whereIn('proposal_output_id', function ($q) {
                $q->select('id')->from('proposal_outputs')->where('category', 'journal');
            });

        $additionalQuery = AdditionalOutput::whereHas('progressReport.proposal', fn ($q) => $q->where('start_year', $period))
            ->whereIn('proposal_output_id', function ($q) {
                $q->select('id')->from('proposal_outputs')->where('category', 'journal');
            });

        $mandatoryOutputs = $mandatoryQuery->get();
        $additionalOutputs = $additionalQuery->get();

        $totalPotentialWeight = ($mandatoryOutputs->count() + $additionalOutputs->count()) * 1.0;

        $currentWeight = 0;
        $reputableCount = 0;

        foreach ($mandatoryOutputs as $output) {
            if ($output->is_verified) {
                $weight = $this->getJournalWeight($output);
                if ($weight > 0) {
                    $currentWeight += $weight;
                    $reputableCount++;
                }
            }
        }

        foreach ($additionalOutputs as $output) {
            if ($output->is_verified) {
                $weight = $this->getJournalWeight($output);
                if ($weight > 0) {
                    $currentWeight += $weight;
                    $reputableCount++;
                }
            }
        }

        $percentage = $totalPotentialWeight > 0 ? ($currentWeight / $totalPotentialWeight) * 100 : 0;

        return [
            'code' => 'IKU-06',
            'name' => 'Publikasi Bereputasi',
            'description' => "$reputableCount artikel terverifikasi dengan total skor bobot ".round($currentWeight, 2).'.',
            'achievement' => $percentage,
            'target' => $target,
        ];
    }

    private function getJournalWeight($output): float
    {
        $rank = $output->rank;
        $indexing = $output->indexing_body;

        if ($indexing === 'Scopus' || $indexing === 'Web of Science') {
            return match (strtoupper((string) $rank)) {
                'Q1' => 1.2,
                'Q2' => 1.0,
                'Q3' => 0.75,
                'Q4' => 0.5,
                default => 0.5,
            };
        }

        return match (strtoupper((string) $rank)) {
            'S1' => 0.8,
            'S2' => 0.7,
            'S3' => 0.6,
            'S4' => 0.5,
            'S5' => 0.4,
            'S6' => 0.3,
            default => 0,
        };
    }

    protected function calculateIku7(string $period): array
    {
        $target = MasterIku::where('code', 'IKU-07')->value('target_percentage') ?? 100;
        $totalProposals = Proposal::where('start_year', $period)->count();
        $sdgProposals = Proposal::where('start_year', $period)
            ->has('sdgs')->count();

        $percentage = $totalProposals > 0 ? ($sdgProposals / $totalProposals) * 100 : 0;

        return [
            'code' => 'IKU-07',
            'name' => 'Keterlibatan SDGs',
            'description' => "$sdgProposals kegiatan teridentifikasi mendukung target SDGs.",
            'achievement' => $percentage,
            'target' => $target,
        ];
    }

    protected function calculateIku8(string $period): array
    {
        $target = MasterIku::where('code', 'IKU-08')->value('target_percentage') ?? 5;
        $totalDosen = User::role('dosen')->count();

        $policyDosen = User::role('dosen')
            ->whereHas('policyInvolvements', function ($query) {
                $query->where('status', 'verified');
            })
            ->count();

        $percentage = $totalDosen > 0 ? ($policyDosen / $totalDosen) * 100 : 0;

        return [
            'code' => 'IKU-08',
            'name' => 'Penyusunan Kebijakan',
            'description' => "$policyDosen dari $totalDosen dosen terlibat dalam rekognisi pakar/kebijakan.",
            'achievement' => $percentage,
            'target' => $target,
        ];
    }

    protected function getIku4Details(string $period, string $search = ''): array
    {
        return Identity::where('type', 'dosen')
            ->where(function ($q) {
                $q->whereNotNull('scopus_id')
                    ->orWhereNotNull('wos_id')
                    ->orWhereNotNull('sinta_id');
            })
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', "%{$search}%");
                })->orWhere('identity_id', 'like', "%{$search}%");
            })
            ->with('user')
            ->get()
            ->map(function ($id) {
                /** @var \App\Models\Identity $id */
                return [
                    'name' => $id->user->name ?? 'N/A',
                    'id_number' => $id->identity_id,
                    'scopus' => $id->scopus_id,
                    'sinta' => $id->sinta_id,
                    'wos' => $id->wos_id,
                ];
            })
            ->toArray();
    }

    protected function getIku5Details(string $period, string $search = ''): array
    {
        return Proposal::where('start_year', $period)
            ->with(['partners', 'submitter'])
            ->whereHas('partners')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sq) use ($search) {
                    $sq->where('title', 'like', "%{$search}%")
                        ->orWhereHas('submitter', fn ($uq) => $uq->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('partners', fn ($pq) => $pq->where('name', 'like', "%{$search}%"));
                });
            })
            ->get()
            ->map(function ($p) {
                $weights = $p->partners->map(function ($partner) {
                    return (strtolower($partner->country) !== 'indonesia' && ! empty($partner->country)) ? 1.5 : 1.0;
                });

                return [
                    'title' => $p->title,
                    'submitter' => $p->submitter->name,
                    'partners' => $p->partners->pluck('name')->implode(', '),
                    'weight' => $weights->max() ?? 0,
                ];
            })
            ->toArray();
    }

    protected function getIku6Details(string $period, string $search = ''): array
    {
        $mandatory = MandatoryOutput::whereHas('progressReport.proposal', fn ($q) => $q->where('start_year', $period))
            ->whereIn('proposal_output_id', function ($q) {
                $q->select('id')->from('proposal_outputs')->where('category', 'journal');
            })
            ->where('is_verified', true)
            ->when($search, function ($q) use ($search) {
                $q->where('article_title', 'like', "%{$search}%")
                    ->orWhere('journal_title', 'like', "%{$search}%");
            })
            ->with('progressReport.proposal')
            ->get();

        $additional = AdditionalOutput::whereHas('progressReport.proposal', fn ($q) => $q->where('start_year', $period))
            ->whereIn('proposal_output_id', function ($q) {
                $q->select('id')->from('proposal_outputs')->where('category', 'journal');
            })
            ->where('is_verified', true)
            ->when($search, function ($q) use ($search) {
                $q->where('article_title', 'like', "%{$search}%")
                    ->orWhere('journal_title', 'like', "%{$search}%");
            })
            ->with('progressReport.proposal')
            ->get();

        return $mandatory->concat($additional)->map(function ($o) {
            /** @var \App\Models\MandatoryOutput|\App\Models\AdditionalOutput $o */
            return [
                'title' => $o->article_title ?? $o->product_name ?? $o->book_title ?? 'N/A',
                'proposal' => $o->progressReport->proposal->title ?? 'N/A',
                'journal' => $o->journal_title ?? $o->publisher ?? 'N/A',
                'rank' => $o->rank ?? 'N/A',
                'indexing' => $o->indexing_body ?? 'N/A',
                'weight' => $this->getJournalWeight($o),
            ];
        })->toArray();
    }

    protected function getIku7Details(string $period, string $search = ''): array
    {
        return Proposal::where('start_year', $period)
            ->has('sdgs')
            ->with(['sdgs', 'submitter'])
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('submitter', fn ($uq) => $uq->where('name', 'like', "%{$search}%"));
            })
            ->get()
            ->map(fn ($p) => [
                'title' => $p->title,
                'submitter' => $p->submitter->name,
                'sdgs' => $p->sdgs->pluck('name')->implode(', '),
            ])
            ->toArray();
    }

    protected function getIku8Details(string $period, string $search = ''): array
    {
        return User::role('dosen')
            ->whereHas('policyInvolvements', function ($query) {
                $query->where('status', 'verified');
            })
            ->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->with('policyInvolvements')
            ->get()
            ->map(fn ($u) => [
                'name' => $u->name,
                'policies' => $u->policyInvolvements->pluck('title')->implode(', '),
            ])
            ->toArray();
    }
}
