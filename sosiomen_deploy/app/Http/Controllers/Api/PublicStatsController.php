<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProposalStatus;
use App\Http\Controllers\Controller;
use App\Models\CommunityService;
use App\Models\Research;
use Illuminate\Http\JsonResponse;

/**
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class PublicStatsController extends Controller
{
    /**
     * Display public statistics.
     */
    public function index(): JsonResponse
    {
        $researchCount = Research::whereHas('proposal', function ($query) {
            $query->where('status', ProposalStatus::COMPLETED);
        })->count();

        $pkmCount = CommunityService::whereHas('proposal', function ($query) {
            $query->where('status', ProposalStatus::COMPLETED);
        })->count();

        return response()->json([
            'data' => [
                'total_research' => $researchCount,
                'total_community_service' => $pkmCount,
                'total_projects' => $researchCount + $pkmCount,
                'last_updated' => now()->toIso8601String(),
            ],
        ]);
    }
}
