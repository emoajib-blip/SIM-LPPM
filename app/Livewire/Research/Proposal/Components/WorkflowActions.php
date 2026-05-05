<?php

namespace App\Livewire\Research\Proposal\Components;

use App\Livewire\Traits\WithApproval;
use App\Livewire\Traits\WithTeamManagement;
use App\Models\Proposal;
use Livewire\Attributes\Computed;
use Livewire\Component;

class WorkflowActions extends Component
{
    use WithApproval, WithTeamManagement {
        WithApproval::toast insteadof WithTeamManagement;
        WithApproval::toastSuccess insteadof WithTeamManagement;
        WithApproval::toastError insteadof WithTeamManagement;
        WithApproval::toastWarning insteadof WithTeamManagement;
        WithApproval::toastInfo insteadof WithTeamManagement;
        WithApproval::getDefaultToastTitle insteadof WithTeamManagement;
    }

    public Proposal $proposal;

    public function mount(Proposal $proposal): void
    {
        $this->proposal = $proposal;
    }

    protected function getProposal(): Proposal
    {
        return $this->proposal;
    }

    #[Computed]
    public function canEdit(): bool
    {
        $user = auth()->user();

        // Only submitter of a draft proposal can edit
        if ($this->proposal->status !== \App\Enums\ProposalStatus::DRAFT
            || $this->proposal->submitter_id !== $user->id) {
            return false;
        }

        // Admin LPPM is always allowed to assist editing
        if ($user->activeHasAnyRole(['admin lppm', 'admin lppm saintek', 'admin lppm dekabita', 'superadmin'])) {
            return true;
        }

        // Dosen: enforce submission schedule window
        return app(\App\Services\LecturerEligibilityService::class)->getScheduleStatus()['research_open'] ?? true;
    }

    #[Computed]
    public function canDelete(): bool
    {
        $user = auth()->user();

        // Submitter of a draft proposal can always delete (schedule does not restrict deletion)
        return $this->proposal->status === \App\Enums\ProposalStatus::DRAFT
            && $this->proposal->submitter_id === $user->id;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.research.proposal.components.workflow-actions');
    }
}
