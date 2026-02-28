<?php

namespace App\Livewire\Users;

use App\Livewire\Concerns\HasToast;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
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
    use HasToast, WithPagination;

    protected string $paginationTheme = 'bootstrap';

    #[Url(except: '')]
    public string $search = '';

    public string $massResetRole = '';

    public string $massResetPassword = '';

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
            'userCounts' => $this->userCountsByRole(),
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
     * Get the count of users for each role.
     *
     * @return array<string, int>
     */
    protected function userCountsByRole(): array
    {
        $counts = Role::query()
            ->withCount('users')
            ->orderByDesc('users_count')
            ->get()
            ->mapWithKeys(fn (Role $role) => [$role->name => $role->users_count])
            ->toArray();

        // Add total count
        $counts['total'] = User::count();

        return $counts;
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
    public function resetPasswordsForRole(): void
    {
        // Strict context check - only allow if acting as Admin/Superadmin
        if (! active_has_any_role(['superadmin', 'admin lppm'])) {
            $this->toastError(__('Anda sedang tidak berada dalam peran administratif untuk melakukan tindakan ini.'));

            return;
        }

        $this->validate([
            'massResetRole' => 'required',
            'massResetPassword' => 'required|min:8',
        ], [
            'massResetRole.required' => 'Role wajib dipilih.',
            'massResetPassword.required' => 'Password baru wajib diisi.',
            'massResetPassword.min' => 'Password minimal 8 karakter.',
        ]);

        // Prevent resetting superadmin passwords via this method for safety
        if ($this->massResetRole === 'superadmin') {
            $this->toastError(__('Password Superadmin hanya dapat diubah secara individual demi keamanan.'));

            return;
        }

        $users = User::role($this->massResetRole)->get();

        if ($users->isEmpty()) {
            $this->toastError(__('Tidak ada pengguna dengan role tersebut.'));

            return;
        }

        $count = 0;
        foreach ($users as $user) {
            // Skip current user
            if ($user->id === auth()->id()) {
                continue;
            }

            // Only skip if the target user is a Superadmin (highest protection)
            // or if the admin is trying to reset a group they don't belong to but target is also an admin
            if ($user->hasRole('superadmin')) {
                continue;
            }

            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($this->massResetPassword),
                'original_password' => $this->massResetPassword,
            ]);
            $count++;
        }

        $targetRoleLabel = str($this->massResetRole)->title();
        $this->toastSuccess(__("Berhasil mereset password untuk {$count} pengguna dengan role {$targetRoleLabel}."));

        // Reset state
        $this->reset(['massResetRole', 'massResetPassword']);

        $this->dispatch('close-modal', modalId: 'reset-password-modal');
    }

    /**
     * Reset password for a single user to a default value.
     */
    public function resetUserPassword(User $user): void
    {
        // Strict context check - only allow if acting as Admin/Superadmin
        if (! active_has_any_role(['superadmin', 'admin lppm'])) {
            $this->toastError(__('Anda sedang tidak berada dalam peran administratif.'));

            return;
        }

        // Prevent resetting superadmins unless by self (different flow usually) or restricted
        if ($user->hasRole('superadmin') && ! active_has_role('superadmin')) {
            $this->toastError(__('Hanya sesama Superadmin yang dapat mereset password akun ini.'));

            return;
        }

        $newPassword = 'password'; // Standard default

        $user->update([
            'password' => Hash::make($newPassword),
            'original_password' => $newPassword,
        ]);

        $this->toastSuccess(__("Password untuk {$user->name} telah direset menjadi: 'password'"));
    }
}
