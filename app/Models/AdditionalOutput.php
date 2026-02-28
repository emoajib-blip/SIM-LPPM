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
 * @property string $progress_report_id
 * @property string $proposal_output_id
 * @property string|null $status
 * @property string|null $book_title
 * @property string|null $publisher_name
 * @property string|null $isbn
 * @property int|null $publication_year
 * @property int|null $total_pages
 * @property string|null $publisher_url
 * @property string|null $book_url
 * @property string|null $document_file
 * @property string|null $publication_certificate
 * @property string|null $journal_title
 * @property string|null $issn
 * @property string|null $eissn
 * @property string|null $indexing_body
 * @property string|null $volume
 * @property string|null $issue_number
 * @property string|null $doi
 * @property string|null $hki_type
 * @property string|null $registration_number
 * @property string|null $inventors
 * @property string|null $product_name
 * @property string|null $description
 * @property string|null $readiness_level
 * @property string|null $implementation_location
 * @property string|null $media_name
 * @property string|null $media_url
 * @property \Illuminate\Support\Carbon|null $publication_date
 * @property string|null $video_url
 * @property string|null $platform
 * @property bool $is_verified
 * @property \Illuminate\Support\Carbon|null $verified_at
 * @property string|null $verified_by
 * @property string|null $rank
 * @property-read \App\Models\ProgressReport $progressReport
 * @property-read \App\Models\ProposalOutput $proposalOutput
 *
 * Virtual properties used in IKU Verification
 * @property string $model_type
 * @property bool $is_verified_status
 * @property string|null $display_title
 * @property string $submitter_name
 * @property string|null $document_url
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class AdditionalOutput extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\AdditionalOutputFactory> */
    use HasFactory, HasUuids, InteractsWithMedia;

    /**
     * The type of the auto-incrementing ID's primary key.
     */
    protected $keyType = 'string';

    /**
     * Indicates if the ID is auto-incrementing.
     */
    public $incrementing = false;

    protected $fillable = [
        'progress_report_id',
        'proposal_output_id',
        'status',
        'book_title',
        'publisher_name',
        'isbn',
        'publication_year',
        'total_pages',
        'publisher_url',
        'book_url',
        'document_file',
        'publication_certificate',
        // New fields
        'journal_title',
        'issn',
        'eissn',
        'indexing_body',
        'volume',
        'issue_number',
        'doi',
        'hki_type',
        'registration_number',
        'inventors',
        'product_name',
        'description',
        'readiness_level',
        'implementation_location',
        'media_name',
        'media_url',
        'publication_date',
        'video_url',
        'platform',
        'is_verified',
        'verified_at',
        'verified_by',
        'rank', // added earlier
    ];

    protected function casts(): array
    {
        return [
            'is_verified' => 'boolean',
            'verified_at' => 'datetime',
            'publication_date' => 'date',
        ];
    }

    /**
     * Get the progress report that owns the additional output.
     */
    public function progressReport(): BelongsTo
    {
        return $this->belongsTo(ProgressReport::class);
    }

    /**
     * Get the proposal output that this additional output is based on.
     */
    public function proposalOutput(): BelongsTo
    {
        return $this->belongsTo(ProposalOutput::class);
    }

    /**
     * Register media collections for this model.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('book_document')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf']);

        $this->addMediaCollection('publication_certificate')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg']);
    }
}
