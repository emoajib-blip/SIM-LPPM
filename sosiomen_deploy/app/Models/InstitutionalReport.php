<?php

namespace App\Models;

use App\Enums\InstitutionalReportStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstitutionalReport extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'type',
        'year',
        'status',
        'submitted_at',
        'approved_at',
        'submitted_by',
        'approved_by',
        'notes',
        'metadata',
        'signature_path',
    ];

    /**
     * The type of the auto-incrementing ID's primary key.
     */
    protected $keyType = 'string';

    /**
     * Indicates if the ID is auto-incrementing.
     */
    public $incrementing = false;

    protected $casts = [
        'status' => InstitutionalReportStatus::class,
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'metadata' => 'array',
    ];

    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
