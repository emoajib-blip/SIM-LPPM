<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class PublicResearchResource extends JsonResource
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
            'scheme' => $proposal?->researchScheme?->name,
            'focus_area' => $proposal?->focusArea?->name,
            'theme' => $proposal?->theme?->name,
            'topic' => $proposal?->topic?->name,
            'submitter' => [
                'name' => $proposal?->submitter?->name,
                'faculty' => $proposal?->submitter?->identity?->faculty?->name,
            ],
            'substance' => [
                'background' => $this->background,
                'state_of_the_art' => $this->state_of_the_art,
                'methodology' => $this->methodology,
            ],
            'keywords' => $proposal?->keywords->pluck('name'),
            'status' => $proposal?->status,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
