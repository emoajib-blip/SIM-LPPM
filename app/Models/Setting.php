<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
    use HasUuids, InteractsWithMedia;

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    /**
     * Register Spatie MediaLibrary collections for template files.
     * Without this, addMedia() to 'template' collection will silently fail.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('template')
            ->singleFile(); // Hanya simpan 1 file per setting key; file lama otomatis tergantikan
    }

    /**
     * Get a setting value by key.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        if (! $setting) {
            return $default;
        }

        return match ($setting->type) {
            'boolean' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
            'integer' => (int) $setting->value,
            'json' => json_decode($setting->value, true),
            default => $setting->value,
        };
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, mixed $value, string $type = 'string'): void
    {
        $processedValue = match ($type) {
            'boolean' => $value ? '1' : '0',
            'json' => json_encode($value),
            default => (string) $value,
        };

        static::updateOrCreate(
            ['key' => $key],
            ['value' => $processedValue, 'type' => $type]
        );
    }
}
