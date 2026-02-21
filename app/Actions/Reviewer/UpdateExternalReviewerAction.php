<?php

namespace App\Actions\Reviewer;

use App\Models\Institution;
use App\Models\ReviewerProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateExternalReviewerAction
{
    public function execute(User $user, array $data): User
    {
        return DB::transaction(function () use ($user, $data) {

            // 1. Update User Basic Info
            $user->update([
                'name' => $data['name'] ?? $user->name,
                'email' => $data['email'] ?? $user->email,
            ]);

            if (isset($data['password']) && ! empty($data['password'])) {
                $user->update(['password' => bcrypt($data['password'])]);
            }

            // 2. Resolve Profile
            $profile = ReviewerProfile::firstOrCreate(
                ['user_id' => $user->id],
                ['institution_name' => 'Pending Setup']
            );

            // 3. Update Institution Logic
            $institutionId = $data['institution_id'] ?? $profile->institution_id;
            $institutionName = $data['institution_name'] ?? $profile->institution_name;

            // SMART LOOKUP: Check if manual name matches existing master record
            if (empty($data['institution_id']) && ! empty($institutionName)) {
                $existing = Institution::where('name', $institutionName)->first();
                if ($existing) {
                    $institutionId = $existing->id;
                    $institutionName = null;
                }
            }

            // Force clear manual name if linking to ID
            if (! empty($institutionId)) {
                $institutionName = null;
            }

            $profile->update([
                'institution_id' => $institutionId,
                'institution_name' => $institutionName,
                'academic_title' => $data['academic_title'] ?? $profile->academic_title,
                'nidn' => $data['nidn'] ?? $profile->nidn,
                'expertise_keywords' => $data['expertise_keywords'] ?? $profile->expertise_keywords,
            ]);

            return $user->refresh();
        });
    }
}
