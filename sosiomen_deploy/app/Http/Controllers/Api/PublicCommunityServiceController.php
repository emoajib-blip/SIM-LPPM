<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProposalStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublicCommunityServiceResource;
use App\Models\CommunityService;
use Illuminate\Http\Request;

/**
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class PublicCommunityServiceController extends Controller
{
    /**
     * Display a listing of completed community service.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);

        $pkm = CommunityService::whereHas('proposal', function ($query) {
            $query->where('status', ProposalStatus::COMPLETED);
        })
            ->with(['proposal.submitter.identity.faculty', 'partner', 'proposal.keywords'])
            ->latest()
            ->paginate($limit);

        return PublicCommunityServiceResource::collection($pkm);
    }

    /**
     * Display the specified community service.
     */
    public function show(string $id)
    {
        $pkm = CommunityService::where('id', $id)
            ->whereHas('proposal', function ($query) {
                $query->where('status', ProposalStatus::COMPLETED);
            })
            ->with(['proposal.submitter.identity.faculty', 'partner', 'proposal.keywords'])
            ->firstOrFail();

        return new PublicCommunityServiceResource($pkm);
    }
}
