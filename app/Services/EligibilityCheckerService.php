<?php

namespace App\Services;

use App\Models\Proposal;
use App\Models\User;

class EligibilityCheckerService
{
    /**
     * Check if a user is eligible to apply for a specific scheme as a leader.
     */
    public function checkLeaderEligibility(User $user, $scheme): array
    {
        return app(\App\Actions\Proposal\IdentityEligibilityAction::class)->execute($user, $scheme, 'leader');
    }

    /**
     * Check if a user is eligible to be a member in a proposal.
     */
    public function checkMemberEligibility(User $user, Proposal $proposal): array
    {
        $scheme = $proposal->research_scheme_id ? $proposal->researchScheme : $proposal->communityServiceScheme;

        return app(\App\Actions\Proposal\IdentityEligibilityAction::class)->execute($user, $scheme, 'member');
    }

    /**
     * Validate the entire team composition for a proposal based on scheme rules.
     */
    public function validateTeamComposition(Proposal $proposal): array
    {
        return app(\App\Actions\Proposal\ValidateTeamCompositionAction::class)->execute($proposal);
    }
}
