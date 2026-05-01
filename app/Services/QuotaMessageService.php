<?php

namespace App\Services;

use App\Models\QuotaMessage;

class QuotaMessageService
{
    /**
     * Get message by key with placeholder replacement
     *
     * @param  array<string, mixed>  $placeholders
     */
    public function getMessage(string $key, array $placeholders = []): string
    {
        $message = QuotaMessage::where('key', $key)->value('message') ?? $this->getDefaultMessage($key);

        return str_replace(
            array_map(fn ($k) => "{{$k}}", array_keys($placeholders)),
            array_values($placeholders),
            $message
        );
    }

    /**
     * Get default message if not found in DB
     */
    private function getDefaultMessage(string $key): string
    {
        return match ($key) {
            'button_tooltip' => 'Kuota terbatas: maksimal {limit} usulan sebagai ketua aktif (termasuk draft)',
            'access_denied' => 'Anda telah mencapai batas maksimal {limit} usulan sebagai ketua. Harap selesaikan atau ajukan usulan yang ada terlebih dahulu.',
            'dashboard_status' => 'Kuota Ketua: {current}/{limit} (termasuk {draft_count} draft)',
            'member_tooltip' => 'Kuota anggota terbatas: maksimal {limit} proposal aktif',
            'member_denied' => 'Anda telah mencapai batas maksimal {limit} proposal sebagai anggota aktif.',
            default => 'Kuota terbatas.',
        };
    }
}
