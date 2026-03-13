<?php

namespace App\Actions;

use App\Models\Institution;

class HandleHybridInstitution
{
    /**
     * Handle hybrid institution input (existing ID or new name).
     *
     * @param  mixed  $input  Can be a numeric ID (string/int) or a new institution name (string)
     * @return int|null The ID of the existing or newly created institution
     */
    public function execute(mixed $input): ?int
    {
        if (empty($input)) {
            return null;
        }

        // 1. If input is numeric, it's likely an existing ID
        if (is_numeric($input)) {
            $institution = Institution::find($input);
            if ($institution) {
                return (int) $institution->id;
            }
        }

        // 2. If not numeric (or ID not found), search by name (case-insensitive search depends on DB)
        // For SQLite, LIKE is case-insensitive for ASCII.
        $existing = Institution::where('name', 'LIKE', $input)->first();
        if ($existing) {
            return (int) $existing->id;
        }

        // 3. Create new institution (Mark as unverified)
        $newInstitution = Institution::create([
            'name' => $input,
            'is_verified' => false,
        ]);

        return (int) $newInstitution->id;
    }
}
