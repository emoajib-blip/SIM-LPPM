<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\CommunityService
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class PublicCommunityServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $proposal = $this->proposal;

        return [
            'id' => $this->id,
            'title' => $proposal?->title,
            'summary' => $proposal?->summary,
            'start_year' => $proposal?->start_year,
            'duration_years' => $proposal?->duration_in_years,
            'partner_name' => $this->partner?->name,
            'partner_issue' => $this->partner_issue_summary,
            'solution' => $this->solution_offered,
            'submitter' => [
                'name' => $proposal?->submitter?->name,
                'faculty' => $proposal?->submitter?->identity?->faculty?->name,
            ],
            'keywords' => $proposal?->keywords->pluck('name'),
            'status' => $proposal?->status,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
