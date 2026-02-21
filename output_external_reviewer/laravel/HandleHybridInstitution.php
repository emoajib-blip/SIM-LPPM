<?php

namespace App\Actions;

use App\Models\Institution;
use Illuminate\Support\Str;

class HandleHybridInstitution
{
    /**
     * @param  string  $input  Bisa berupa UUID atau Nama Institusi Baru
     */
    public function execute(string $input): Institution
    {
        // 1. Cek apakah input adalah UUID yang valid (Existing)
        if (Str::isUuid($input)) {
            return Institution::findOrFail($input);
        }

        // 2. Jika bukan UUID, cari berdasarkan nama (Case Insensitive)
        $existing = Institution::where('name', 'ILIKE', $input)->first();
        if ($existing) {
            return $existing;
        }

        // 3. Buat Institusi Baru (Status: Unverified)
        return Institution::create([
            'name' => $input,
            'is_verified' => false,
        ]);
    }
}
