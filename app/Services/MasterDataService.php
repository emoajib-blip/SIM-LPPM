<?php

namespace App\Services;

use App\Models\BudgetComponent;
use App\Models\BudgetGroup;
use App\Models\CommunityServiceScheme;
use App\Models\FocusArea;
use App\Models\IkuOutputType;
use App\Models\MacroResearchGroup;
use App\Models\MasterIku;
use App\Models\NationalPriority;
use App\Models\Partner;
use App\Models\ResearchScheme;
use App\Models\ScienceCluster;
use App\Models\Sdg;
use App\Models\Setting;
use App\Models\Theme;
use App\Models\TktLevel;
use App\Models\Topic;
use Illuminate\Support\Collection;

class MasterDataService
{
    protected array $cache = [];

    public function schemes(): Collection
    {
        return $this->cache['schemes'] ??= ResearchScheme::all();
    }

    public function communityServiceSchemes(): Collection
    {
        try {
            return $this->cache['community_service_schemes'] ??= CommunityServiceScheme::all();
        } catch (\Exception $e) {
            \Log::error('Failed to load community service schemes: '.$e->getMessage());

            return collect(); // Return empty collection instead of crashing
        }
    }

    public function focusAreas(?string $proposalType = null): Collection
    {
        $cacheKey = 'focus_areas_'.($proposalType ?? 'all');

        return $this->cache[$cacheKey] ??= FocusArea::with('themes.topics')
            ->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true))
            ->get();
    }

    public function themes(?int $focusAreaId = null, ?string $proposalType = null): Collection
    {
        $query = Theme::with('topics');

        if ($focusAreaId !== null) {
            $query->where('focus_area_id', $focusAreaId);
        }

        $query->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true));

        if ($focusAreaId === null && $proposalType === null) {
            return $this->cache['themes'] ??= $query->get();
        }

        return $query->get();
    }

    public function topics(?int $focusAreaId = null, ?int $themeId = null, ?string $proposalType = null): Collection
    {
        $query = Topic::query();

        if ($focusAreaId !== null) {
            $query->whereHas('theme', fn ($q) => $q->where('focus_area_id', $focusAreaId));
        }

        if ($themeId !== null) {
            $query->where('theme_id', $themeId);
        }

        $query->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true));

        return $query->get();
    }

    public function nationalPriorities(): Collection
    {
        return $this->cache['national_priorities'] ??= NationalPriority::all();
    }

    public function scienceClusters(?string $proposalType = null): Collection
    {
        $cacheKey = 'science_clusters_'.($proposalType ?? 'all');

        return $this->cache[$cacheKey] ??= ScienceCluster::query()
            ->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true))
            ->get();
    }

    public function clusterLevel1Options(?string $proposalType = null): Collection
    {
        return $this->scienceClusters($proposalType)->whereNull('parent_id');
    }

    public function clusterLevel2Options(?int $level1Id = null, ?string $proposalType = null): Collection
    {
        $query = clone $this->scienceClusters($proposalType)->whereNotNull('parent_id');

        if ($level1Id !== null) {
            $query = $query->where('parent_id', $level1Id);
        }

        // Only include those where parent is level 1 (optional, but good for clarity)
        return $query;
    }

    public function clusterLevel3Options(?int $level2Id = null, ?string $proposalType = null): Collection
    {
        $query = clone $this->scienceClusters($proposalType)->whereNotNull('parent_id');

        if ($level2Id !== null) {
            $query = $query->where('parent_id', $level2Id);
        }

        return $query;
    }

    public function macroResearchGroups(): Collection
    {
        return $this->cache['macro_research_groups'] ??= MacroResearchGroup::all();
    }

    public function partners(): Collection
    {
        return $this->cache['partners'] ??= Partner::all();
    }

    public function sdgs(): Collection
    {
        return $this->cache['sdgs'] ??= Sdg::all();
    }

    public function budgetGroups(): Collection
    {
        return $this->cache['budget_groups'] ??= BudgetGroup::with('components')->get();
    }

    public function budgetComponents(?int $groupId = null): Collection
    {
        if ($groupId === null) {
            return $this->cache['budget_components'] ??= BudgetComponent::all();
        }

        return BudgetComponent::where('budget_group_id', $groupId)->get();
    }

    public function tktTypes(?string $proposalType = null): Collection
    {
        $cacheKey = 'tkt_types_'.($proposalType ?? 'all');

        return $this->cache[$cacheKey] ??= TktLevel::query()
            ->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true))
            ->distinct()
            ->pluck('type')
            ->filter();
    }

    public function tktLevelsByType(?string $type = null, ?string $proposalType = null): Collection
    {
        $query = TktLevel::query();

        if ($type !== null) {
            $query->where('type', $type);
        }

        $query->when($proposalType === 'research', fn ($q) => $q->where('is_active_for_research', true))
            ->when($proposalType === 'community-service', fn ($q) => $q->where('is_active_for_community_service', true));

        return $query->orderBy('level')->get();
    }

    public function getTemplateUrl(string $type): ?string
    {
        $key = match ($type) {
            'research' => 'research_proposal_template',
            'community-service' => 'community_service_proposal_template',
            'research-progress' => 'research_progress_report_template',
            'research-final' => 'research_final_report_template',
            'community-service-progress' => 'community_service_progress_report_template',
            'community-service-final' => 'community_service_final_report_template',
            'partner-commitment' => 'partner_commitment_template',
            default => null,
        };

        if (! $key) {
            return null;
        }

        $setting = Setting::where('key', $key)->first();

        if ($setting && $setting->hasMedia('template')) {
            return $setting->getFirstMediaUrl('template');
        }

        return null;
    }

    public function ikuOutputTypes(): Collection
    {
        return $this->cache['iku_output_types'] ??= IkuOutputType::where('is_active', true)->get();
    }

    public function clearCache(): void
    {
        $this->cache = [];
    }

    /**
     * Get all active IKU Master Data.
     */
    public function masterIkus(): Collection
    {
        return MasterIku::where('is_active', true)->orderBy('code')->get();
    }
}
