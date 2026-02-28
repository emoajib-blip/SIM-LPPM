<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\BudgetCap;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * BudgetCapManager component for managing year-based budget caps.
 *
 * Only accessible by Admin LPPM users. Allows setting maximum budget
 * limits for research and community service proposals per year.
 */
class BudgetCapManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|integer|min:2000|max:2100')]
    public string $year = '';

    #[Validate('nullable|integer|min:0')]
    public ?string $research_budget_cap = null;

    #[Validate('nullable|integer|min:0')]
    public ?string $community_service_budget_cap = null;

    public array $research_scheme_caps = [];

    public array $community_service_scheme_caps = [];

    public ?int $editingId = null;

    public string $modalTitle = 'Pengaturan Anggaran';

    public ?int $deleteItemId = null;

    public string $deleteItemYear = '';

    /**
     * Authorization check - only Admin LPPM can access this component
     */
    public function mount(): void
    {
        if (! Auth::user()->hasRole('admin lppm')) {
            abort(403, 'Hanya Admin LPPM yang dapat mengakses pengaturan anggaran.');
        }
    }

    public function render()
    {
        return view('livewire.settings.tabs.budget-cap-manager', [
            'budgetCaps' => BudgetCap::latest('year')->paginate(10),
            'researchSchemes' => \App\Models\ResearchScheme::all(),
            'communityServiceSchemes' => \App\Models\CommunityServiceScheme::all(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['year', 'research_budget_cap', 'community_service_budget_cap', 'research_scheme_caps', 'community_service_scheme_caps', 'editingId']);
        $this->modalTitle = 'Tambah Pengaturan Anggaran';
    }

    public function save(): void
    {
        $this->validate();

        // Check for duplicate year (except when editing)
        $exists = BudgetCap::where('year', $this->year)
            ->when($this->editingId, function ($query) {
                $query->where('id', '!=', $this->editingId);
            })
            ->exists();

        if ($exists) {
            $this->addError('year', 'Pengaturan anggaran untuk tahun '.$this->year.' sudah ada.');

            return;
        }

        // Map array string inputs to structured associative array JSON
        $schemeCaps = [
            'research' => [],
            'community_service' => [],
        ];
        foreach ($this->research_scheme_caps as $id => $val) {
            if ($val !== '' && $val !== null) {
                // Remove non-numeric characters potentially bypassed
                $schemeCaps['research'][$id] = (int) preg_replace('/\D/', '', $val);
            }
        }
        foreach ($this->community_service_scheme_caps as $id => $val) {
            if ($val !== '' && $val !== null) {
                $schemeCaps['community_service'][$id] = (int) preg_replace('/\D/', '', $val);
            }
        }

        $data = [
            'year' => (int) $this->year,
            'research_budget_cap' => $this->research_budget_cap ? (int) $this->research_budget_cap : null,
            'community_service_budget_cap' => $this->community_service_budget_cap ? (int) $this->community_service_budget_cap : null,
            'scheme_caps' => $schemeCaps,
        ];

        if ($this->editingId) {
            BudgetCap::findOrFail($this->editingId)->update($data);
        } else {
            BudgetCap::create($data);
        }

        $message = $this->editingId ? 'Pengaturan Anggaran berhasil diubah' : 'Pengaturan Anggaran berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-budget-cap');
        $this->reset(['year', 'research_budget_cap', 'community_service_budget_cap', 'research_scheme_caps', 'community_service_scheme_caps', 'editingId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(BudgetCap $budgetCap): void
    {
        $this->editingId = $budgetCap->id;
        $this->year = (string) $budgetCap->year;
        $this->research_budget_cap = $budgetCap->research_budget_cap ? (string) (int) $budgetCap->research_budget_cap : null;
        $this->community_service_budget_cap = $budgetCap->community_service_budget_cap ? (string) (int) $budgetCap->community_service_budget_cap : null;

        /** @var array<string, array<int, mixed>> $caps */
        $caps = is_array($budgetCap->scheme_caps) ? $budgetCap->scheme_caps : [];
        $this->research_scheme_caps = [];
        $this->community_service_scheme_caps = [];

        if (is_array($caps) && isset($caps['research']) && is_array($caps['research'])) {
            foreach ($caps['research'] as $k => $v) {
                $this->research_scheme_caps[$k] = (string) $v;
            }
        }

        if (is_array($caps) && isset($caps['community_service']) && is_array($caps['community_service'])) {
            foreach ($caps['community_service'] as $k => $v) {
                $this->community_service_scheme_caps[$k] = (string) $v;
            }
        }

        $this->modalTitle = 'Edit Pengaturan Anggaran';
        $this->dispatch('open-modal', modalId: 'modal-budget-cap');
    }

    public function delete(BudgetCap $budgetCap): void
    {
        $budgetCap->delete();

        $this->resetForm();
        $message = 'Pengaturan Anggaran berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['year', 'research_budget_cap', 'community_service_budget_cap', 'research_scheme_caps', 'community_service_scheme_caps', 'editingId']);
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            BudgetCap::findOrFail($this->deleteItemId)->delete();

            $message = 'Pengaturan Anggaran berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->resetConfirmDelete();
        }
    }

    public function resetConfirmDelete(): void
    {
        $this->reset(['deleteItemId', 'deleteItemYear']);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteItemId = $id;
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $this->deleteItemYear = (string) (\App\Models\BudgetCap::find($id)->year ?? '');
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-budget-cap');
    }
}
