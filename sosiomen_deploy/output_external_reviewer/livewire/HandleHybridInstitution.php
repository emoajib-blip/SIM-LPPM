<?php

namespace App\Actions;

use App\Models\Institution;
use Illuminate\Support\Str;

class HandleHybridInstitution
{
    public function execute(?string $input): ?string
    {
        if (! $input) {
            return null;
        }

        // Jika input adalah UUID valid, gunakan yang sudah ada
        if (Str::isUuid($input)) {
            return $input;
        }

        // Jika input adalah string baru, buat institusi unverified
        $institution = Institution::create([
            'name' => $input,
            'is_verified' => false,
            'metadata' => ['source' => 'external_reviewer_registration'],
        ]);

        return $institution->id;
    }
}
