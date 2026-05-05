<?php

namespace App\Livewire\Research\Proposal;

use App\Livewire\Concerns\HasToast;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property-read \App\Models\Proposal|null $proposal
 * @property-read \Illuminate\Support\Collection|\App\Models\User[] $teamMembers
 * @property-read \Illuminate\Support\Collection|\App\Models\User[] $pendingInvitations
 * @property-read \Illuminate\Support\Collection|\App\Models\User[] $acceptedMembers
 * @property-read \Illuminate\Support\Collection|\App\Models\User[] $rejectedMembers
 * @property-read bool $allAccepted
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class TeamMemberInvitations extends Component
{
    use HasToast;

    public string $proposalId = '';

    public function mount(string $proposalId): void
    {
        $this->proposalId = $proposalId;
    }

    #[Computed]
    public function proposal(): ?Proposal
    {
        return Proposal::with(['teamMembers.user'])->find($this->proposalId);
    }

    #[Computed]
    public function teamMembers(): \Illuminate\Support\Collection
    {
        return $this->proposal->teamMembers()
            ->orderByPivot('created_at', 'desc')
            ->get();
    }

    #[Computed]
    public function pendingInvitations(): \Illuminate\Support\Collection
    {
        return $this->teamMembers->filter(fn ($member) => $member->pivot->status === 'pending');
    }

    #[Computed]
    public function acceptedMembers(): \Illuminate\Support\Collection
    {
        return $this->teamMembers->filter(fn ($member) => $member->pivot->status === 'accepted');
    }

    #[Computed]
    public function rejectedMembers(): \Illuminate\Support\Collection
    {
        return $this->teamMembers->filter(fn ($member) => $member->pivot->status === 'rejected');
    }

    #[Computed]
    public function allAccepted(): bool
    {
        $total = $this->teamMembers->count();
        $accepted = $this->acceptedMembers->count();

        return $total > 0 && $total === $accepted;
    }

    public function acceptInvitation(): void
    {
        $user = Auth::user();
        $proposal = $this->proposal;

        $member = $proposal->teamMembers()
            ->where('user_id', $user->id)
            ->first();

        if (! $member) {
            $this->toastError('Anda bukan anggota proposal ini');

            return;
        }

        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        if ($member->pivot->getAttribute('status') === 'accepted') {
            $this->toastInfo('Anda sudah menerima undangan');

            return;
        }

        $proposal->teamMembers()
            ->updateExistingPivot($user->id, ['status' => 'accepted']);

        session()->flash('success', 'Undangan diterima');
        $this->toastSuccess('Undangan diterima');
        $this->dispatch('team-member-action');
    }

    public function rejectInvitation(): void
    {
        $user = Auth::user();
        $proposal = $this->proposal;

        $member = $proposal->teamMembers()
            ->where('user_id', $user->id)
            ->first();

        if (! $member) {
            session()->flash('error', 'Anda bukan anggota proposal ini');
            $this->toastError('Anda bukan anggota proposal ini');

            return;
        }

        $proposal->teamMembers()
            ->updateExistingPivot($user->id, ['status' => 'rejected']);

        session()->flash('success', 'Undangan ditolak');
        $this->toastSuccess('Undangan ditolak');
        $this->dispatch('team-member-action');
    }

    public function render(): View
    {
        return view('livewire.research.proposal.team-member-invitations');
    }
}
