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
 * @property string|null $status_type
 * @property string|null $author_status
 * @property string|null $journal_title
 * @property string|null $issn
 * @property string|null $eissn
 * @property string|null $indexing_body
 * @property string|null $journal_url
 * @property string|null $article_title
 * @property int|null $publication_year
 * @property string|null $volume
 * @property string|null $issue_number
 * @property string|null $page_start
 * @property string|null $page_end
 * @property string|null $article_url
 * @property string|null $doi
 * @property string|null $document_file
 * @property string|null $book_title
 * @property string|null $isbn
 * @property string|null $authors
 * @property string|null $publisher
 * @property int|null $total_pages
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
class MandatoryOutput extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\MandatoryOutputFactory> */
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
        'status_type',
        'author_status',
        'journal_title',
        'issn',
        'eissn',
        'indexing_body',
        'journal_url',
        'article_title',
        'publication_year',
        'volume',
        'issue_number',
        'page_start',
        'page_end',
        'article_url',
        'doi',
        'document_file',
        // New fields
        'book_title',
        'isbn',
        'authors',
        'publisher',
        'total_pages',
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
        'rank',
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
     * Get the progress report that owns the mandatory output.
     */
    public function progressReport(): BelongsTo
    {
        return $this->belongsTo(ProgressReport::class);
    }

    /**
     * Get the proposal output that this mandatory output is based on.
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
        $this->addMediaCollection('journal_article')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf']);
    }
}
