<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class FeatureFlags extends Component
{
    public bool $featureRoadmapActive = false;

    public bool $featureKaprodiValidation = false;

    public function mount()
    {
        $this->featureRoadmapActive = Setting::get('feature_roadmap_active', false);
        $this->featureKaprodiValidation = Setting::get('feature_kaprodi_validation', false);
    }

    public function updated($property, $value)
    {
        if ($property === 'featureRoadmapActive') {
            Setting::set('feature_roadmap_active', clone $value);
        }

        if ($property === 'featureKaprodiValidation') {
            Setting::set('feature_kaprodi_validation', clone $value);
        }

        // We dispatch a browser event or notify the user
        $this->dispatch('settings-updated', message: 'Feature Flags berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.settings.feature-flags');
    }
}
