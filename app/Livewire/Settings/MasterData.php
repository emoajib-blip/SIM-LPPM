<?php

namespace App\Livewire\Settings;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MasterData extends Component
{
    use WithPagination;

    #[Url(as: 'group')]
    public string $group = 'academic-content';

    #[Url(as: 'tab')]
    public string $activeTab = '';

    public function mount(): void
    {
        $user = auth()->user();
        $roadmapActive = \App\Models\Setting::get('feature_roadmap_active', false);

        // Jika fitur roadmap nonaktif, Dekan & Kaprodi dilarang akses (kecuali mereka juga admin)
        if (!$roadmapActive && ($user->hasRole('dekan') || $user->hasRole('kaprodi'))) {
            if (!$user->hasRole('admin lppm') && !$user->hasRole('superadmin')) {
                abort(403, 'Maaf Anda tidak memiliki akses ini');
            }
        }

        if (empty($this->activeTab)) {
            $this->activeTab = match ($this->group) {
                'academic-structure' => 'study-programs',
                'budget' => 'budget-groups',
                'partnership' => 'partners',
                'academic-content' => 'focus-areas',
                default => 'focus-areas',
            };
        }
    }

    public function setActiveTab(string $tab): void
    {
        $this->resetPage();
        $this->activeTab = $tab;
    }

    public function render()
    {
        $title = match ($this->group) {
            'academic-structure' => 'Struktur Akademik',
            'budget' => 'Anggaran & RAB',
            'partnership' => 'Kemitraan & Prioritas',
            default => 'Master Data',
        };

        return view('livewire.settings.master-data', [
            'pageTitle' => $title,
        ]);
    }
}
