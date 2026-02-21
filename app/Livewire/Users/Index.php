<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.app', ['title' => 'Users', 'pageTitle' => 'Kelola Pengguna', 'pageSubtitle' => 'Kelola data pengguna'])]
class Index extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    #[Url(except: '')]
    public string $search = '';

    #[Url(except: 'all')]
    public string $role = 'all';

    #[Url(except: 'all')]
    public string $status = 'all';

    #[Url(except: 'latest')]
    public string $sort = 'latest';

    public int $perPage = 10;

    #[On('user-created')]
    public function handleUserCreated(): void
    {
        $this->resetPage();
    }

    /**
     * Reset the paginator when the search term is updated.
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Reset the paginator when the role filter is updated.
     */
    public function updatingRole(): void
    {
        $this->resetPage();
    }

    /**
     * Reset the paginator when the status filter is updated.
     */
    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    /**
     * Reset the paginator when the sort filter is updated.
     */
    public function updatingSort(): void
    {
        $this->resetPage();
    }

    /**
     * Render the component view.
     */
    public function render(): View
    {
        return view('livewire.users.index', [
            'users' => $this->users(),
            'roleOptions' => $this->roleOptions(),
            'statusOptions' => $this->statusOptions(),
        ]);
    }

    /**
     * Retrieve paginated users with the current filters applied.
     */
    protected function users(): LengthAwarePaginator
    {
        $perPage = max(5, min(50, $this->perPage));
        $search = trim($this->search);

        return User::query()
            ->with(['roles', 'identity'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhereHas('identity', fn ($relation) => $relation->where('identity_id', 'like', "%{$search}%"));
                });
            })
            ->when($this->role !== 'all', fn ($query) => $query->whereHas('roles', fn ($relation) => $relation->where('name', $this->role)))
            ->when($this->status !== 'all', function ($query) {
                if ($this->status === 'verified') {
                    $query->whereNotNull('email_verified_at');
                }

                if ($this->status === 'unverified') {
                    $query->whereNull('email_verified_at');
                }
            })
            ->when($this->sort === 'latest', fn ($query) => $query->orderByDesc('created_at'))
            ->when($this->sort === 'oldest', fn ($query) => $query->orderBy('created_at'))
            ->when($this->sort === 'name_asc', fn ($query) => $query->orderBy('name'))
            ->when($this->sort === 'name_desc', fn ($query) => $query->orderByDesc('name'))
            ->when(! in_array($this->sort, ['latest', 'oldest', 'name_asc', 'name_desc']), fn ($query) => $query->orderByDesc('created_at'))
            ->paginate($perPage)
            ->withQueryString();
    }

    /**
     * Build the available role filter options.
     *
     * @return array<int, array<string, string>>
     */
    protected function roleOptions(): array
    {
        return Role::query()
            ->orderBy('name')
            ->get()
            ->map(fn (Role $role) => [
                'value' => $role->name,
                'label' => str($role->name)->title()->toString(),
            ])
            ->prepend([
                'value' => 'all',
                'label' => __('All roles'),
            ])
            ->values()
            ->all();
    }

    /**
     * Build the available status filter options.
     *
     * @return array<int, array<string, string>>
     */
    protected function statusOptions(): array
    {
        return [
            [
                'value' => 'all',
                'label' => __('All status'),
            ],
            [
                'value' => 'verified',
                'label' => __('Verified'),
            ],
            [
                'value' => 'unverified',
                'label' => __('Pending verification'),
            ],
        ];
    }

    /**
     * Delete a user.
     */
    public function delete(User $user): void
    {
        // Prevent deleting self
        if ($user->id === auth()->id()) {
            session()->flash('error', __('Anda tidak dapat menghapus akun Anda sendiri.'));

            return;
        }

        // Prevent deleting superadmins
        if ($user->hasRole('superadmin')) {
            session()->flash('error', __('Akun Superadmin tidak dapat dihapus demi keamanan sistem.'));

            return;
        }

        // Only superadmin and admin lppm can delete
        if (! auth()->user()->hasAnyRole(['superadmin', 'admin lppm'])) {
            session()->flash('error', __('Anda tidak memiliki izin untuk menghapus pengguna.'));

            return;
        }

        $user->delete();

        session()->flash('success', __('Pengguna berhasil dihapus.'));
    }

    /**
     * Bulk reset password for a specific role.
     */
    public function resetPasswordsForRole(string $targetRole, string $newPassword): void
    {
        // Only superadmin and admin lppm can perform this action
        if (! auth()->user()->hasAnyRole(['superadmin', 'admin lppm'])) {
            $this->dispatch('toast-error', message: __('Anda tidak memiliki izin untuk melakukan tindakan ini.'));

            return;
        }

        if (empty($targetRole) || empty($newPassword)) {
            $this->dispatch('toast-error', message: __('Role dan password baru harus diisi.'));

            return;
        }

        // Prevent resetting superadmin passwords via this method for safety
        if ($targetRole === 'superadmin') {
            $this->dispatch('toast-error', message: __('Tidak dapat mereset password superadmin secara massal.'));

            return;
        }

        $users = User::role($targetRole)->get();

        if ($users->isEmpty()) {
            $this->dispatch('toast-error', message: __('Tidak ada pengguna dengan role tersebut.'));

            return;
        }

        $count = 0;
        foreach ($users as $user) {
            // Skip current user to avoid logging themselves out or changing their own password unexpectedly
            if ($user->id === auth()->id()) {
                continue;
            }

            // Protect high-privilege users from accidental resets when targeting lower roles
            // e.g. If targeting 'dosen', skip users who are also 'rektor' or 'dekan'
            $protectedRoles = ['superadmin', 'admin lppm', 'rektor', 'dekan', 'kepala lppm'];

            // If the target role itself is NOT one of the protected roles,
            // then we should SKIP any user who HOLDS a protected role.
            if (! in_array($targetRole, $protectedRoles)) {
                if ($user->hasAnyRole($protectedRoles)) {
                    continue;
                }
            }

            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($newPassword),
                'original_password' => $newPassword,
            ]);
            $count++;
        }

        $this->dispatch('toast-success', message: __("Berhasil mereset password untuk {$count} pengguna dengan role {$targetRole}."));
        $this->dispatch('close-modal', modal: 'reset-password-modal');
    }
}
