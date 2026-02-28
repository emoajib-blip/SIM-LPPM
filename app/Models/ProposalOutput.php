<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $proposal_id
 * @property int|null $output_year
 * @property string|null $category
 * @property string|null $group
 * @property string|null $type
 * @property string|null $target_status
 * @property string|null $description
 * @property-read \App\Models\Proposal $proposal
 */
class ProposalOutput extends Model
{
    /** @use HasFactory<\Database\Factories\ProposalOutputFactory> */
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'output_year',
        'category',
        'group',
        'type',
        'target_status',
        'description',
    ];

    /**
     * Get the proposal that owns the output.
     */
    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }
}
