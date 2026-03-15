<?php

namespace App\Livewire\Components;

use App\Models\CommunityServiceScheme;
use App\Models\ResearchScheme;
use App\Services\EligibilityService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SchemeEligibilityChecker extends Component
{
    public string $schemeType = 'research'; // 'research' or 'community_service'

    public ?string $selectedSchemeId = null;

    public bool $showEligibilityModal = false;

    public array $eligibilityStatus = [];

    public Collection $eligibleSchemes;

    public Collection $ineligibleSchemes;

    public function mount(string $schemeType = 'research'): void
    {
        $this->schemeType = $schemeType;
        $this->loadEligibilityData();
    }

    public function loadEligibilityData(): void
    {
        $user = Auth::user();
        $identity = $user?->identity;

        if (! $identity) {
            $this->eligibleSchemes = collect();
            $this->ineligibleSchemes = collect();

            return;
        }

        $eligibilityService = app(EligibilityService::class);

        if ($this->schemeType === 'research') {
            $this->eligibleSchemes = $eligibilityService->getEligibleResearchSchemes($identity);
            $this->ineligibleSchemes = $eligibilityService->getIneligibleResearchSchemes($identity);
        } else {
            $this->eligibleSchemes = $eligibilityService->getEligibleCommunityServiceSchemes($identity);
        }
    }

    public function checkEligibility(string $schemeId): void
    {
        $user = Auth::user();
        $identity = $user?->identity;

        if (! $identity) {
            $this->dispatch('toast', message: 'Data identitas tidak ditemukan', type: 'error');

            return;
        }

        // Find the scheme
        if ($this->schemeType === 'research') {
            $scheme = ResearchScheme::find($schemeId);
        } else {
            $scheme = CommunityServiceScheme::find($schemeId);
        }

        if (! $scheme) {
            $this->dispatch('toast', message: 'Skema tidak ditemukan', type: 'error');

            return;
        }

        $eligibilityService = app(EligibilityService::class);
        $this->eligibilityStatus = $eligibilityService->getEligibilityStatus(
            $identity,
            $scheme->eligibility_rules ?? []
        );

        $this->selectedSchemeId = $schemeId;
        $this->showEligibilityModal = true;
    }

    public function selectScheme(string $schemeId): void
    {
        $this->dispatch('scheme-selected', schemeId: $schemeId, schemeType: $this->schemeType);
        $this->showEligibilityModal = false;
    }

    public function render()
    {
        return view('livewire.components.scheme-eligibility-checker');
    }
}
