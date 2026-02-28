<?php

namespace App\Actions\Scheme;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class UpdateSchemeEligibilityAction
{
    /**
     * Update eligibility rules for a scheme and log the activity.
     */
    public function execute($scheme, array $rules): void
    {
        $oldRules = $scheme->eligibility_rules;
        $scheme->update(['eligibility_rules' => $rules]);

        // Audit Log
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'update_eligibility_rules',
            'description' => "Updated eligibility rules for scheme: {$scheme->name}. ".
                'Rules changed from '.json_encode($oldRules).' to '.json_encode($rules),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
        ]);
    }
}
