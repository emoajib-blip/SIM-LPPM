<?php

namespace App\Livewire\Accreditation;

use App\Livewire\Forms\AccreditationFilterForm;
use App\Models\Proposal;
use App\Models\Setting;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class Hub extends Component
{
    use WithPagination;

    public AccreditationFilterForm $form;

    public function mount()
    {
        $this->form->period = request()->query('period', date('Y'));
    }

    #[Computed]
    public function periods()
    {
        return Proposal::select('start_year')
            ->distinct()
            ->orderBy('start_year', 'desc')
            ->pluck('start_year');
    }

    #[Computed]
    public function templates()
    {
        return Setting::where('key', 'like', '%template%')
            ->with('media')
            ->get()
            ->map(function (\App\Models\Setting $setting) {
                return [
                    'name' => str_replace(['_', 'template'], [' ', ''], $setting->key),
                    'media' => $setting->getFirstMedia('template'),
                    'key' => $setting->key,
                ];
            })->filter(fn ($item) => $item['media'] !== null);
    }

    #[Computed]
    public function results()
    {
        return Proposal::query()
            ->with(['submitter.identity', 'researchScheme', 'communityServiceScheme', 'progressReports.mandatoryOutputs.proposalOutput'])
            ->when($this->form->search, function ($query) {
                $query->where('title', 'like', '%'.$this->form->search.'%')
                    ->orWhereHas('submitter', fn ($q) => $q->where('name', 'like', '%'.$this->form->search.'%'));
            })
            ->when($this->form->period, fn ($q) => $q->where('start_year', $this->form->period))
            ->where('status', 'approved')
            ->latest()
            ->paginate(10);
    }

    public function updatedForm()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.accreditation.hub', [
            'pageTitle' => 'Pusat Data Akreditasi',
            'pageSubtitle' => 'Akses cepat dokumen pendukung akreditasi Program Studi & Institusi.',
            'breadcrumbs' => [
                'Laporan' => route('reports.research'),
                'Akreditasi' => route('accreditation.hub'),
            ],
        ]);
    }
}
