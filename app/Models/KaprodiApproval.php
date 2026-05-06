<?php

namespace App\Models;

use App\Enums\KaprodiStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KaprodiApproval extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'proposal_kaprodi_approvals';

    protected $fillable = [
        'proposal_id',
        'kaprodi_user_id',
        'status',
        'notes',
        'approved_at',
        'rejected_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => KaprodiStatus::class,
            'approved_at' => 'datetime',
            'rejected_at' => 'datetime',
        ];
    }

    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    public function kaprodi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kaprodi_user_id');
    }
}
