<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuotaMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'key' => 'button_tooltip',
                'message' => 'Kuota terbatas: maksimal {limit} usulan sebagai ketua aktif (termasuk draft)',
            ],
            [
                'key' => 'access_denied',
                'message' => 'Anda telah mencapai batas maksimal {limit} usulan sebagai ketua. Harap selesaikan atau ajukan usulan yang ada terlebih dahulu.',
            ],
            [
                'key' => 'dashboard_status',
                'message' => 'Kuota Ketua: {current}/{limit} (termasuk {draft_count} draft)',
            ],
            [
                'key' => 'member_tooltip',
                'message' => 'Kuota anggota terbatas: maksimal {limit} proposal aktif',
            ],
            [
                'key' => 'member_denied',
                'message' => 'Anda telah mencapai batas maksimal {limit} proposal sebagai anggota aktif.',
            ],
        ];

        foreach ($messages as $message) {
            \App\Models\QuotaMessage::updateOrCreate(
                ['key' => $message['key']],
                ['message' => $message['message']]
            );
        }
    }
}
