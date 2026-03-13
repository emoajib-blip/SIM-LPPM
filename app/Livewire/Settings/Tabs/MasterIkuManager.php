<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\MasterIku;
use App\Models\Setting;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * MasterIkuManager
 * 
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager.
 * This component manages IKU targets, weights, and manual override status.
 */
class MasterIkuManager extends Component
{
    use HasToast, WithPagination;

    public ?int $editingId = null;
    public string $modalTitle = 'Master IKU';

    public string $name = '';
    public string $code = '';
    public string $description = '';

    public $target_percentage = 0;
    public $internal_weight = 0;
    public bool $is_active = true;

    // Manual Override Fields (Stored in Settings)
    public bool $is_manual = false;
    public $manual_value = 0;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'code' => 'required|min:2|unique:master_ikus,code,' . $this->editingId,
            'target_percentage' => 'required|numeric|min:0|max:100',
            'internal_weight' => 'required|numeric|min:0|max:100',
        ];
    }

    public function render()
    {
        return view('livewire.settings.tabs.master-iku-manager', [
            'items' => MasterIku::orderBy('code')->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalTitle = 'Tambah Master IKU Baru';
        $this->dispatch('open-modal', modalId: 'modal-master-iku');
    }

    public function edit(MasterIku $item): void
    {
        $this->editingId = $item->id;
        $this->name = $item->name;
        $this->code = $item->code;
        $this->description = $item->description;
        $this->target_percentage = $item->target_percentage;
        $this->internal_weight = $item->internal_weight;
        $this->is_active = $item->is_active;

        // Load Manual Override settings
        $this->is_manual = (bool) Setting::where('key', "iku_manual_{$item->code}")->value('value');
        $this->manual_value = Setting::where('key', "iku_manual_value_{$item->code}")->value('value') ?? 0;

        $this->modalTitle = 'Edit Master IKU: ' . $item->code;
        $this->dispatch('open-modal', modalId: 'modal-master-iku');
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'code' => $this->code, // Editable only on create, controlled by UI
            'description' => $this->description,
            'target_percentage' => $this->target_percentage,
            'internal_weight' => $this->internal_weight,
            'is_active' => $this->is_active,
        ];

        if ($this->editingId) {
            $iku = MasterIku::findOrFail($this->editingId);
            unset($data['code']); // Prevent editing code for existing records
            $iku->update($data);
            $message = "Master IKU {$iku->code} berhasil diperbarui";
        } else {
            $iku = MasterIku::create($data);
            $message = "Master IKU {$iku->code} berhasil ditambahkan";
        }

        // Save Manual Override settings to existing 'settings' table (Zero Migration)
        Setting::updateOrCreate(['key' => "iku_manual_{$iku->code}"], ['value' => $this->is_manual]);
        Setting::updateOrCreate(['key' => "iku_manual_value_{$iku->code}"], ['value' => $this->manual_value]);

        $this->dispatch('close-modal', modalId: 'modal-master-iku');
        $this->toastSuccess($message);
        $this->resetForm();
    }

    public function toggleStatus(MasterIku $item): void
    {
        $item->update(['is_active' => !$item->is_active]);
        $this->toastSuccess('Status berhasil diubah');
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'code', 'description', 'target_percentage', 'internal_weight', 'is_active', 'editingId', 'is_manual', 'manual_value']);
    }
}
