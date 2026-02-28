<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $tkt_level_id
 * @property string|null $code
 * @property string $indicator
 * @property-read \Illuminate\Database\Eloquent\Relations\Pivot $pivot
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class TktIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'tkt_level_id',
        'code',
        'indicator',
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(TktLevel::class, 'tkt_level_id');
    }
}
