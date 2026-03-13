<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $id
 * @property string $proposal_id
 * @property \Illuminate\Support\Carbon $monev_date
 * @property int $progress_percentage
 * @property string|null $notes
 * @property-read \App\Models\Proposal $proposal
 *
 * "Efficiency is the goal, but Integrity is the foundation."
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class ProposalMonev extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $fillable = [
        'proposal_id',
        'monev_date',
        'progress_percentage',
        'notes',
        'academic_year',
        'semester',
    ];

    protected function casts(): array
    {
        return [
            'monev_date' => 'date',
        ];
    }

    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('berita_acara')
            ->singleFile()
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ]);

        $this->addMediaCollection('borang')
            ->singleFile()
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ]);

        $this->addMediaCollection('rekap_penilaian')
            ->singleFile()
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ]);
    }
}
