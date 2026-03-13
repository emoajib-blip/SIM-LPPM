<?php

namespace App\Livewire\Users;

use App\Models\ActivityLog;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityLogList extends Component
{
    use WithPagination;

    public User $user;

    public function render()
    {
        $logs = ActivityLog::where('user_id', $this->user->id)
            ->latest()
            ->paginate(10);

        return view('livewire.users.activity-log-list', [
            'logs' => $logs,
        ]);
    }
}
