<?php

namespace App\Livewire\Forms;

use App\Models\CommunityService;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\ResearchScheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProposalForm extends Form
{
    public ?Proposal $proposal = null;

    public bool $isDraft = false;

    public string $title = '';

    public string $research_scheme_id = '';

    public ?string $community_service_scheme_id = null;

    #[Validate('nullable|exists:study_program_roadmaps,id')]
    public ?string $study_program_roadmap_id = null;

    #[Validate('required|exists:focus_areas,id')]
    public string $focus_area_id = '';

    #[Validate('required|exists:themes,id')]
    public string $theme_id = '';

    #[Validate('required|exists:topics,id')]
    public string $topic_id = '';

    #[Validate('required|array|min:1|max:5')]
    public array $keywords = [];

    #[Validate('nullable|exists:national_priorities,id')]
    public string $national_priority_id = '';

    #[Validate('required|exists:science_clusters,id')]
    public string $cluster_level1_id = '';

    #[Validate('nullable|exists:science_clusters,id')]
    public string $cluster_level2_id = '';

    #[Validate('nullable|exists:science_clusters,id')]
    public string $cluster_level3_id = '';

    #[Validate('nullable|numeric|min:0')]
    public string $sbk_value = '';

    #[Validate('required|integer|min:1|max:10')]
    public string $duration_in_years = '1';

    #[Validate('required|integer|min:2020|max:2050')]
    public string $start_year = '';

    #[Validate('required|string|min:100')]
    public string $summary = '';

    public string $asta_cita = '';

    public string $tkt_type = '';

    public array $tkt_results = []; // [level_id => ['percentage' => 100]]

    public array $tkt_indicator_scores = []; // [indicator_id => score]

    public string $background = '';

    public string $state_of_the_art = '';

    public string $methodology = '';

    #[Validate('nullable|array')]
    public array $roadmap_data = [];

    // CommunityService-specific fields
    #[Validate('nullable|exists:partners,id')]
    public string $partner_id = '';

    #[Validate('nullable|string|min:50')]
    public string $partner_issue_summary = '';

    #[Validate('nullable|string|min:50')]
    public string $solution_offered = '';

    #[Validate('nullable|array')]
    public array $members = [];

    #[Validate('required')]
    public string $author_tasks = '';

    // Step 2: Substansi Usulan
    #[Validate('nullable|exists:macro_research_groups,id')]
    public string $macro_research_group_id = '';

    public $substance_file;

    public $approval_file;

    #[Validate('nullable|array')]
    public array $outputs = [];

    #[Validate('nullable|array')]
    public array $sdg_ids = [];

    #[Validate('nullable|array')]
    public array $targeted_iku_ids = [];

    // Step 3: RAB (Budget)
    #[Validate('nullable|array')]
    public array $budget_items = [];

    // Eligibility Check dummy field
    public string $eligibility_check = '';

    // Step 4: Dokumen Pendukung (Partners)
    #[Validate('nullable|array')]
    public array $partner_ids = [];

    public array $new_partner = [
        'name' => '',
        'email' => '',
        'institution' => '',
        'country' => '',
        'type' => '',
        'address' => '',
    ];

    public $new_partner_commitment_file;

    /**
     * Set proposal data for editing
     */
    public function setProposal(Proposal $proposal): void
    {
        $proposal->loadMissing([
            'submitter.identity',
            'detailable',
            'teamMembers.identity',
            'outputs',
            'budgetItems.budgetComponent',
            'budgetItems.budgetGroup',
            'partners',
            'reviewers.user',
            'sdgs',
            'targetedIkus',
        ]);

        $proposal->loadMorph('detailable', [
            Research::class => ['tktLevels', 'tktIndicators', 'macroResearchGroup'],
            CommunityService::class => ['macroResearchGroup'],
        ]);

        $this->proposal = $proposal;

        // Load common proposal fields
        $this->title = $proposal->title ?? '';
        $this->research_scheme_id = $proposal->research_scheme_id;
        $this->community_service_scheme_id = $proposal->community_service_scheme_id;
        $this->focus_area_id = $proposal->focus_area_id ?? '';
        $this->theme_id = $proposal->theme_id ?? '';
        $this->topic_id = $proposal->topic_id ?? '';
        $this->study_program_roadmap_id = $proposal->study_program_roadmap_id ? (string) $proposal->study_program_roadmap_id : null;
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager

        $this->keywords = $proposal->keywords ? $proposal->keywords->pluck('name')->toArray() : [];
        $this->national_priority_id = $proposal->national_priority_id ?? '';
        $this->cluster_level1_id = $proposal->cluster_level1_id ?? '';
        $this->cluster_level2_id = $proposal->cluster_level2_id ?? '';
        $this->cluster_level3_id = $proposal->cluster_level3_id ?? '';
        $this->sbk_value = (string) $proposal->sbk_value;
        $this->duration_in_years = (string) $proposal->duration_in_years;
        $this->start_year = (string) ($proposal->start_year ?? date('Y'));
        $this->summary = $proposal->summary ?? '';
        $this->asta_cita = $proposal->asta_cita ?? '';
        $this->sdg_ids = $proposal->sdgs->pluck('id')->toArray();
        $this->targeted_iku_ids = $proposal->targetedIkus->pluck('id')->toArray();

        // Load detailable-specific fields based on type
        $detailable = $proposal->detailable;

        // Vetted by AI - Manual Review Required by Senior Engineer/Manager

        if ($detailable) {
            if ($detailable instanceof Research) {
                // Research-specific fields
                $this->macro_research_group_id = (string) ($detailable->macro_research_group_id ?? '');
                $this->macro_research_group_id = (string) ($detailable->macro_research_group_id ?? '');
                $this->tkt_type = $detailable->tkt_type ?? '';
                // Load TKT results from pivot
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                $this->tkt_results = $detailable->tktLevels->mapWithKeys(function ($level) {
                    return [$level->id => ['percentage' => $level->pivot->getAttribute('percentage')]];
                })->toArray();
                // Load TKT indicator scores
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                $this->tkt_indicator_scores = $detailable->tktIndicators->mapWithKeys(function ($indicator) {
                    return [$indicator->id => $indicator->pivot->getAttribute('score')];
                })->toArray();
                $this->background = $detailable->background ?? '';
                $this->state_of_the_art = $detailable->state_of_the_art ?? '';
                $this->methodology = $detailable->methodology ?? '';
                $this->roadmap_data = $detailable->roadmap_data ?? [];
                // substance_file is a path string, keep as is
                // $this->substance_file will be null for edit (file uploads handled separately)

                // CommunityService fields should be empty for Research
                $this->partner_id = '';
                $this->partner_issue_summary = '';
                $this->solution_offered = '';
            } elseif ($detailable instanceof CommunityService) {
                // CommunityService-specific fields
                $this->macro_research_group_id = (string) ($detailable->macro_research_group_id ?? '');
                $this->partner_id = $detailable->partner_id ?? '';
                $this->partner_issue_summary = $detailable->partner_issue_summary ?? '';
                $this->solution_offered = $detailable->solution_offered ?? '';
                $this->background = $detailable->background ?? '';
                $this->methodology = $detailable->methodology ?? '';

                // Research fields should be empty for CommunityService
                $this->tkt_type = '';
                $this->tkt_results = [];
                $this->tkt_indicator_scores = [];
                $this->state_of_the_art = '';
                $this->roadmap_data = [];
            }
        }

        // Load team members (excluding ketua/submitter - only load anggota)
        $this->members = $proposal->teamMembers
            ->filter(function ($member) {
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                // Only include non-ketua members (anggota)
                return $member->pivot->getAttribute('role') !== 'ketua';
            })
            ->map(function ($member) {
                return [
                    'name' => $member->name,
                    'nidn' => $member->identity?->identity_id,
                    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                    'tugas' => $member->pivot->getAttribute('tasks'),
                    'role' => $member->pivot->getAttribute('role'),
                    'status' => $member->pivot->getAttribute('status') ?? 'pending',
                ];
            })
            ->values()
            ->toArray();

        // Load student members from JSON column
        if (! empty($proposal->student_members)) {
            $studentMembersJSON = $proposal->student_members;
            // Vetted by AI - Manual Review Required by Senior Engineer/Manager

            if (is_string($studentMembersJSON)) {
                $studentMembersJSON = json_decode($studentMembersJSON, true);
            }

            // Vetted by AI - Manual Review Required by Senior Engineer/Manager

            if (is_array($studentMembersJSON)) {
                foreach ($studentMembersJSON as $student) {
                    $this->members[] = [
                        'name' => $student['name'],
                        'nidn' => $student['identifier'], // Map identifier back to nidn field
                        'tugas' => $student['tasks'],
                        'role' => $student['role'] ?? 'mahasiswa',
                        'status' => 'accepted', // JSON members are implicitly accepted/manual
                        'is_manual' => true,
                    ];
                }
            }
        }

        // Load author tasks from ketua's pivot data
        $ketuaMember = $proposal->teamMembers
            ->firstWhere('pivot.role', 'ketua');

        if ($ketuaMember) {
            $this->author_tasks = $ketuaMember->pivot->tasks ?? '';
        }

        // Load outputs
        $this->outputs = $proposal->outputs->map(function ($output) {
            return [
                'year' => $output->output_year,
                'category' => $output->category,
                'group' => strtolower($output->group ?? ''),
                'type' => $output->type,
                'status' => $output->target_status,
                'description' => $output->description ?? '',
            ];
        })->toArray();

        // Load budget items
        $this->budget_items = $proposal->budgetItems->map(function ($item) {
            return [
                'year' => $item->year ?? 1,
                'budget_group_id' => $item->budget_group_id,
                'budget_component_id' => $item->budget_component_id,
                'group' => $item->group,
                'component' => $item->component,
                'item' => $item->item_description,
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                'unit' => $item->budgetComponent->unit ?? '',
                'volume' => $item->volume,
                'unit_price' => $item->unit_price,
                'total' => $item->total_price,
            ];
        })->toArray();

        // Load partners
        $this->partner_ids = $proposal->partners->pluck('id')->toArray();
    }

    /**
     * Store a new proposal
     */
    public function store(string $submitterId): Proposal
    {
        return DB::transaction(function () use ($submitterId, &$proposal) {
            if ($this->research_scheme_id) {
                // It's a Research proposal
                $proposal = $this->storeResearch($submitterId);
            } else {
                // It's a Community Service proposal
                $proposal = $this->storeCommunityService($submitterId);
            }

            return $proposal;
        });
    }

    /**
     * Store a new Research proposal
     */
    public function storeResearch(string $submitterId): Proposal
    {
        // Do NOT call validate() again - it was already called in the Create component
        // This prevents double-validation and maintains form data integrity

        $research = Research::create([
            'macro_research_group_id' => $this->macro_research_group_id ?: null,
            'tkt_type' => $this->tkt_type ?: null,
            'background' => $this->background ?: null,
            'state_of_the_art' => $this->state_of_the_art ?: null,
            'methodology' => $this->methodology ?: null,
            'roadmap_data' => $this->roadmap_data ?: null,
        ]);

        // Upload substance file using Media Library
        if ($this->substance_file) {
            $research
                ->addMedia($this->substance_file->getRealPath())
                ->usingName($this->substance_file->getClientOriginalName())
                ->usingFileName($this->substance_file->hashName())
                ->withCustomProperties(['uploaded_by' => $submitterId])
                ->toMediaCollection('substance_file');

            // Reset to prevent "UnableToRetrieveMetadata" error on subsequent validations
            $this->substance_file = null;
        }

        // Upload approval file if exists
        if ($this->approval_file) {
            $research
                ->addMedia($this->approval_file->getRealPath())
                ->usingName($this->approval_file->getClientOriginalName())
                ->usingFileName($this->approval_file->hashName())
                ->withCustomProperties(['uploaded_by' => $submitterId])
                ->toMediaCollection('approval_file');

            $this->approval_file = null;
        }

        $proposal = Proposal::create([
            'title' => $this->title,
            'submitter_id' => $submitterId,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'research_scheme_id' => $this->research_scheme_id,
            'focus_area_id' => $this->focus_area_id,
            'theme_id' => $this->theme_id,
            'topic_id' => $this->topic_id,
            'national_priority_id' => $this->national_priority_id ?: null,
            'study_program_roadmap_id' => $this->study_program_roadmap_id ?: null,
            'cluster_level1_id' => $this->cluster_level1_id,
            'cluster_level2_id' => $this->cluster_level2_id ?: null,
            'cluster_level3_id' => $this->cluster_level3_id ?: null,
            'sbk_value' => ! empty($this->sbk_value) ? $this->sbk_value : null,
            'duration_in_years' => (int) $this->duration_in_years,
            'start_year' => (int) $this->start_year,
            'summary' => $this->summary,
            'asta_cita' => $this->asta_cita ?: null,
            'status' => 'draft',
        ]);

        $this->attachTeamMembers($proposal, $submitterId);
        $this->attachOutputs($proposal);
        $this->attachBudgetItems($proposal);
        $this->attachPartners($proposal);
        $this->attachKeywords($proposal);
        $this->attachSdgs($proposal);
        $this->attachTargetedIkus($proposal);

        // Attach TKT Levels
        if (! empty($this->tkt_results)) {
            $research->tktLevels()->sync($this->tkt_results);
        }

        // Attach TKT Indicators
        if (! empty($this->tkt_indicator_scores)) {
            $indicatorSyncData = [];
            foreach ($this->tkt_indicator_scores as $indicatorId => $score) {
                $indicatorSyncData[$indicatorId] = ['score' => $score];
            }
            $research->tktIndicators()->sync($indicatorSyncData);
        }

        return $proposal;
    }

    /**
     * Store a new Community Service proposal
     */
    public function storeCommunityService(string $submitterId): Proposal
    {
        // Do NOT call validate() again - it was already called in the Create component
        // This prevents double-validation and maintains form data integrity

        $communityService = CommunityService::create([
            'macro_research_group_id' => $this->macro_research_group_id ?: null,
            'partner_id' => $this->partner_id ?: null,
            'partner_issue_summary' => $this->partner_issue_summary ?: null,
            'solution_offered' => $this->solution_offered ?: null,
            'background' => $this->background,
            'methodology' => $this->methodology,
        ]);

        // Upload substance file using Media Library
        if ($this->substance_file) {
            $communityService
                ->addMedia($this->substance_file->getRealPath())
                ->usingName($this->substance_file->getClientOriginalName())
                ->usingFileName($this->substance_file->hashName())
                ->withCustomProperties(['uploaded_by' => $submitterId])
                ->toMediaCollection('substance_file');

            // Reset to prevent "UnableToRetrieveMetadata" error on subsequent validations
            $this->substance_file = null;
        }

        // Upload approval file if exists
        if ($this->approval_file) {
            $communityService
                ->addMedia($this->approval_file->getRealPath())
                ->usingName($this->approval_file->getClientOriginalName())
                ->usingFileName($this->approval_file->hashName())
                ->withCustomProperties(['uploaded_by' => $submitterId])
                ->toMediaCollection('approval_file');

            $this->approval_file = null;
        }

        $proposal = Proposal::create([
            'title' => $this->title,
            'submitter_id' => $submitterId,
            'detailable_id' => $communityService->id,
            'detailable_type' => CommunityService::class,
            'community_service_scheme_id' => $this->community_service_scheme_id,
            'focus_area_id' => $this->focus_area_id,
            'theme_id' => $this->theme_id,
            'topic_id' => $this->topic_id,
            'national_priority_id' => $this->national_priority_id ?: null,
            'study_program_roadmap_id' => $this->study_program_roadmap_id ?: null,
            'cluster_level1_id' => $this->cluster_level1_id,
            'cluster_level2_id' => $this->cluster_level2_id ?: null,
            'cluster_level3_id' => $this->cluster_level3_id ?: null,
            'sbk_value' => ! empty($this->sbk_value) ? $this->sbk_value : null,
            'duration_in_years' => (int) $this->duration_in_years,
            'start_year' => (int) $this->start_year,
            'summary' => $this->summary,
            'asta_cita' => $this->asta_cita ?: null,
            'status' => 'draft',
        ]);

        $this->attachTeamMembers($proposal, $submitterId);
        $this->attachOutputs($proposal);
        $this->attachBudgetItems($proposal);
        $this->attachPartners($proposal);
        $this->attachKeywords($proposal);
        $this->attachSdgs($proposal);
        $this->attachTargetedIkus($proposal);

        return $proposal;
    }

    /**
     * Update existing proposal
     */
    public function update(bool $validate = true): void
    {
        if ($validate) {
            $this->validate();
        }

        DB::transaction(function (): void {
            // Update detailable based on type
            $detailable = $this->proposal->detailable;

            // Vetted by AI - Manual Review Required by Senior Engineer/Manager

            if ($detailable) {
                if ($detailable instanceof Research) {
                    // Update Research-specific fields
                    $detailable->update([
                        'macro_research_group_id' => $this->macro_research_group_id ?: null,
                        'tkt_type' => $this->tkt_type ?: null,
                        'background' => $this->background,
                        'state_of_the_art' => $this->state_of_the_art ?: null,
                        'methodology' => $this->methodology,
                        'roadmap_data' => $this->roadmap_data ?: null,
                    ]);

                    // Update substance file ONLY if a new file is uploaded
                    if ($this->substance_file && ! is_string($this->substance_file)) {
                        $detailable
                            ->addMedia($this->substance_file->getRealPath())
                            ->usingName($this->substance_file->getClientOriginalName())
                            ->usingFileName($this->substance_file->hashName())
                            ->withCustomProperties(['uploaded_by' => Auth::id()])
                            ->toMediaCollection('substance_file');

                        // Reset to prevent "UnableToRetrieveMetadata" error on subsequent validations
                        $this->substance_file = null;
                    }

                    // Update approval file ONLY if a new file is uploaded
                    if ($this->approval_file && ! is_string($this->approval_file)) {
                        $detailable
                            ->addMedia($this->approval_file->getRealPath())
                            ->usingName($this->approval_file->getClientOriginalName())
                            ->usingFileName($this->approval_file->hashName())
                            ->withCustomProperties(['uploaded_by' => Auth::id()])
                            ->toMediaCollection('approval_file');

                        $this->approval_file = null;
                    }
                    // IMPORTANT: If $this->substance_file is null, we do NOTHING.
                    // This preserves the existing file in the media collection.

                    // Sync TKT Levels
                    if (! empty($this->tkt_results)) {
                        $detailable->tktLevels()->sync($this->tkt_results);
                    }

                    // Sync TKT Indicators
                    if (! empty($this->tkt_indicator_scores)) {
                        $indicatorSyncData = [];
                        foreach ($this->tkt_indicator_scores as $indicatorId => $score) {
                            $indicatorSyncData[$indicatorId] = ['score' => $score];
                        }
                        $detailable->tktIndicators()->sync($indicatorSyncData);
                    }
                } elseif ($detailable instanceof CommunityService) {
                    // Update CommunityService-specific fields
                    $detailable->update([
                        'macro_research_group_id' => $this->macro_research_group_id ?: null,
                        'partner_id' => $this->partner_id ?: null,
                        'partner_issue_summary' => $this->partner_issue_summary ?: null,
                        'solution_offered' => $this->solution_offered ?: null,
                        'background' => $this->background,
                        'methodology' => $this->methodology,
                    ]);

                    // Update substance file ONLY if a new file is uploaded
                    if ($this->substance_file && ! is_string($this->substance_file)) {
                        $detailable
                            ->addMedia($this->substance_file->getRealPath())
                            ->usingName($this->substance_file->getClientOriginalName())
                            ->usingFileName($this->substance_file->hashName())
                            ->withCustomProperties(['uploaded_by' => Auth::id()])
                            ->toMediaCollection('substance_file');

                        // Reset to prevent "UnableToRetrieveMetadata" error on subsequent validations
                        $this->substance_file = null;
                    }

                    // Update approval file ONLY if a new file is uploaded
                    if ($this->approval_file && ! is_string($this->approval_file)) {
                        $detailable
                            ->addMedia($this->approval_file->getRealPath())
                            ->usingName($this->approval_file->getClientOriginalName())
                            ->usingFileName($this->approval_file->hashName())
                            ->withCustomProperties(['uploaded_by' => Auth::id()])
                            ->toMediaCollection('approval_file');

                        $this->approval_file = null;
                    }
                }
            }

            // Update proposal fields
            $this->proposal->update([
                'title' => $this->title,
                'research_scheme_id' => $this->research_scheme_id ?: null,
                'community_service_scheme_id' => $this->community_service_scheme_id ?: null,
                'focus_area_id' => $this->focus_area_id,
                'theme_id' => $this->theme_id,
                'topic_id' => $this->topic_id,
                'national_priority_id' => $this->national_priority_id ?: null,
                'study_program_roadmap_id' => $this->study_program_roadmap_id ?: null,
                'cluster_level1_id' => $this->cluster_level1_id,
                'cluster_level2_id' => $this->cluster_level2_id ?: null,
                'cluster_level3_id' => $this->cluster_level3_id ?: null,
                'sbk_value' => ! empty($this->sbk_value) ? $this->sbk_value : null,
                'duration_in_years' => (int) $this->duration_in_years,
                'start_year' => (int) $this->start_year,
                'summary' => $this->summary,
                'asta_cita' => $this->asta_cita ?: null,
            ]);

            $this->attachTeamMembers($this->proposal, $this->proposal->submitter_id);

            // Update outputs (delete old, create new)
            $this->proposal->outputs()->delete();
            $this->attachOutputs($this->proposal);

            // Update budget items (delete old, create new)
            $this->proposal->budgetItems()->delete();
            $this->attachBudgetItems($this->proposal);

            // Update partners (sync)
            $this->attachPartners($this->proposal);

            // Update keywords (sync)
            $this->attachKeywords($this->proposal);

            // Update SDGs (sync)
            $this->attachSdgs($this->proposal);

            $this->attachTargetedIkus($this->proposal);
        });
    }

    /**
     * Delete proposal and its research
     */
    public function delete(): void
    {
        if ($this->proposal) {
            DB::transaction(function (): void {
                $this->proposal->teamMembers()->detach();
                // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                $this->proposal->detailable->delete();
                $this->proposal->delete();
            });
        }
    }

    /**
     * Override validation rules based on proposal type
     */
    public function rules(): array
    {
        // Determine if this is a Research or CommunityService proposal
        $isResearch = ($this->proposal && $this->proposal->detailable_type === Research::class) || $this->research_scheme_id;
        $isCommunityService = $this->proposal && $this->proposal->detailable_type === CommunityService::class;

        $rules = [
            'title' => 'required|string|max:255',
            'research_scheme_id' => 'nullable|exists:research_schemes,id',
            'focus_area_id' => 'required|exists:focus_areas,id',
            'theme_id' => 'required|exists:themes,id',
            'topic_id' => 'required|exists:topics,id',
            'national_priority_id' => 'nullable|exists:national_priorities,id',
            'cluster_level1_id' => 'required|exists:science_clusters,id',
            'cluster_level2_id' => 'nullable|exists:science_clusters,id',
            'cluster_level3_id' => 'nullable|exists:science_clusters,id',
            'sbk_value' => 'nullable|numeric|min:0',
            'duration_in_years' => 'required|integer|min:1|max:10',
            'start_year' => 'required|integer|min:2020|max:2050',
            'summary' => 'required|string|min:100',
            'asta_cita' => 'nullable|string',
            'eligibility_check' => [
                function ($attribute, $value, $fail) {
                    $schemeId = $this->research_scheme_id ?: $this->community_service_scheme_id;
                    if (! $schemeId) {
                        return;
                    }

                    $scheme = $this->research_scheme_id
                        ? \App\Models\ResearchScheme::find($schemeId)
                        : \App\Models\CommunityServiceScheme::find($schemeId);

                    if (! $scheme) {
                        return;
                    }

                    $result = app(\App\Actions\Proposal\IdentityEligibilityAction::class)->execute(Auth::user(), $scheme);
                    if (! $result['is_eligible']) {
                        $fail($result['reason']);
                    }
                },
            ],
        ];

        if ($isCommunityService) {
            $rules['research_scheme_id'] = 'nullable|exists:research_schemes,id';
            $rules['community_service_scheme_id'] = 'required|exists:community_service_schemes,id';
            $rules['partner_id'] = 'nullable|exists:partners,id';
            $rules['partner_issue_summary'] = 'nullable|string|min:50';
            $rules['solution_offered'] = 'nullable|string|min:50';
        }

        if ($isResearch) {
            $rules['research_scheme_id'] = 'required|exists:research_schemes,id';
            $rules['tkt_type'] = 'required|string|max:255';
        }

        // Add conditional rules based on proposal type
        // if ($isResearch) {
        // $rules['background'] = 'nullable|string|min:200';
        // $rules['methodology'] = 'nullable|string|min:200';
        // $rules['state_of_the_art'] = 'nullable|string|min:200';
        // $rules['tkt_type'] = 'nullable|string|max:255';
        // $rules['roadmap_data'] = 'nullable|array';

        $rules['tkt_results'] = [
            'nullable',
            'array',
            function ($attribute, $value, $fail) {
                if (empty($value)) {
                    return;
                }

                // 1. Calculate achieved level
                $achievedLevel = 0;
                // Get level models to map IDs to integer levels
                $levels = \App\Models\TktLevel::whereIn('id', array_keys($value))->get();

                foreach ($levels as $level) {
                    $data = $value[$level->id] ?? null;
                    // Check if passed (percentage >= 80)
                    if ($data && isset($data['percentage']) && $data['percentage'] >= 80) {
                        $achievedLevel = max($achievedLevel, $level->level);
                    }
                }

                // 2. Get required range for the scheme if selected
                if ($this->research_scheme_id) {
                    $scheme = ResearchScheme::find($this->research_scheme_id);
                    if ($scheme && $scheme->strata) {
                        $range = \App\Livewire\Research\Proposal\Components\TktMeasurement::getTktRangeForStrata($scheme->strata);

                        // If range exists (not PKM), validate
                        if ($range) {
                            [$min, $max] = $range;

                            // Check if achieved level is within range
                            if ($achievedLevel < $min || $achievedLevel > $max) {
                                $fail("TKT Saat Ini (Level $achievedLevel) tidak sesuai dengan Skema $scheme->strata (Target: Level $min - $max).");
                            }
                        }
                    }
                }
            },
        ];
        // } elseif ($isCommunityService) {
        // For CommunityService, background and methodology can be null or shorter
        // $rules['background'] = 'nullable|string|min:50';
        // $rules['methodology'] = 'nullable|string|min:50';
        // $rules['partner_id'] = 'nullable|exists:partners,id';
        // $rules['partner_issue_summary'] = 'nullable|string|min:50';
        //     $rules['solution_offered'] = 'nullable|string|min:50';
        // } else {
        // For new proposals (no detailable yet), both Research and CommunityService need these
        // $rules['background'] = 'required|string|min:200';
        // $rules['methodology'] = 'required|string|min:200';
        // }

        $rules['members'] = 'nullable|array';

        // Strict validation for array inputs to prevent injection
        $rules['outputs.*.year'] = 'required|integer|min:1|max:10';
        $rules['outputs.*.category'] = ['required', Rule::in(\App\Constants\ProposalConstants::OUTPUT_CATEGORIES)];
        // Group and Type validated in step-specific rules in components for better context

        $rules['budget_items.*.year'] = 'required|integer|min:1|max:10';
        $rules['budget_items.*.budget_group_id'] = 'required|exists:budget_groups,id';
        $rules['budget_items.*.budget_component_id'] = 'required|exists:budget_components,id';
        $rules['budget_items.*.volume'] = 'required|numeric|min:0.01';
        $rules['budget_items.*.unit_price'] = 'required|numeric|min:1';

        return $rules;
    }

    private function attachTeamMembers(Proposal $proposal, string $submitterId): void
    {
        // Prepare sync data with all team members
        $syncData = [];
        $studentMembers = [];

        // Add submitter as ketua (team leader) - always accepted
        $syncData[$submitterId] = [
            'tasks' => $this->author_tasks,
            'role' => 'ketua',
            'status' => 'accepted', // Submitter/ketua is always accepted
        ];

        // Get the submitter user for notifications
        $submitter = \App\Models\User::find($submitterId);

        // Get existing members to preserve their status
        $existingMembers = $proposal->teamMembers()->withPivot('status')->get()->keyBy('id');
        $existingMemberIds = $existingMembers->keys()->toArray();

        // Add other team members (anggota) - filter out ketua if it exists in members array
        if (! empty($this->members)) {
            foreach ($this->members as $member) {
                // Skip the ketua (submitter) from the members list
                if (isset($member['role']) && $member['role'] === 'ketua') {
                    continue;
                }

                // Check if member is a student
                if (isset($member['role']) && $member['role'] === 'mahasiswa') {
                    $studentMembers[] = [
                        'name' => $member['name'],
                        'identifier' => $member['nidn'], // Using nidn field as identifier (NIM)
                        'role' => 'mahasiswa',
                        'tasks' => $member['tugas'] ?? '',
                        'study_program' => $member['study_program'] ?? '-',
                        'institution' => $member['institution'] ?? 'ITSNU Pekalongan',
                    ];

                    continue;
                }

                $identity = \App\Models\Identity::where('identity_id', $member['nidn'])->first();

                // If not found and it's a manual entry, create a shadow user
                if (! $identity && ! empty($member['is_manual'])) {
                    $user = \App\Models\User::firstOrCreate(
                        ['email' => $member['email']],
                        [
                            'name' => $member['name'],
                            'password' => bcrypt(\Illuminate\Support\Str::random(16)),
                        ]
                    );

                    if (! $user->identity) {
                        $institutionId = \App\Models\Institution::where('name', 'like', '%'.($member['institution'] ?? '').'%')->first()?->id;

                        $user->identity()->create([
                            'identity_id' => $member['nidn'],
                            'type' => $member['role'] ?? 'dosen',
                            'institution_id' => $institutionId,
                        ]);
                    }

                    $roleName = $member['role'] ?? 'dosen';
                    // Only assign if the role actually exists in the system
                    $roleExists = \Spatie\Permission\Models\Role::where('name', $roleName)->exists();

                    if ($roleExists && ! $user->hasRole($roleName)) {
                        $user->assignRole($roleName);
                    }

                    $identity = $user->identity;
                }

                if ($identity) {
                    $userId = $identity->user_id;

                    // Preserve status if already exists, otherwise default to pending
                    $status = ! empty($member['is_manual']) ? 'accepted' : 'pending';
                    if (isset($existingMembers[$userId])) {
                        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
                        $status = $existingMembers[$userId]->pivot->getAttribute('status');
                    }

                    $syncData[$userId] = [
                        'tasks' => $member['tugas'] ?? '',
                        'role' => $member['role'] ?? 'anggota',
                        'status' => $status,
                    ];

                    // Send invitation notification ONLY if it's a completely new member AND not manual
                    if (! in_array($userId, $existingMemberIds) && empty($member['is_manual'])) {
                        $invitee = $identity->user;
                        $notificationService = app(\App\Services\NotificationService::class);
                        $notificationService->notifyTeamInvitationSent($proposal, $submitter, $invitee);
                    }
                }
            }
        }

        // Sync team members (excluding students who are now stored in JSON)
        $proposal->teamMembers()->sync($syncData);

        // Update student members JSON
        $proposal->update(['student_members' => $studentMembers]);
    }

    private function attachOutputs(Proposal $proposal): void
    {
        if (! empty($this->outputs)) {
            foreach ($this->outputs as $output) {
                $proposal->outputs()->create([
                    'output_year' => $output['year'] ?? 1, // date('Y'),
                    'category' => $output['category'] ?? 'Wajib',
                    'group' => $output['group'] ?? '',
                    'type' => $output['type'] ?? '',
                    'target_status' => $output['status'] ?? '',
                    'description' => $output['description'] ?? null,
                ]);
            }
        }
    }

    private function attachBudgetItems(Proposal $proposal): void
    {
        if (! empty($this->budget_items)) {
            // Validate budget before saving (skip for drafts)
            if (! $this->isDraft) {
                $this->validateBudgetGroupPercentages();
                $this->validateBudgetCap($this->getProposalType());
            }

            foreach ($this->budget_items as $item) {
                // Skip entirely empty items (often added as defaults but not filled)
                if (empty($item['budget_group_id']) && empty($item['item']) && (empty($item['unit_price']) || $item['unit_price'] == 0)) {
                    continue;
                }

                // Ensure IDs are null if empty string to avoid DB errors
                $groupId = ! empty($item['budget_group_id']) ? $item['budget_group_id'] : null;
                $componentId = ! empty($item['budget_component_id']) ? $item['budget_component_id'] : null;

                $proposal->budgetItems()->create([
                    'year' => $item['year'] ?? 1,
                    'budget_group_id' => $groupId,
                    'budget_component_id' => $componentId,
                    'group' => $item['group'] ?? '',
                    'component' => $item['component'] ?? '',
                    'item_description' => $item['item'] ?? '',
                    'volume' => $item['volume'] ?? 0,
                    'unit_price' => $item['unit_price'] ?? 0,
                    'total_price' => $item['total'] ?? 0,
                ]);
            }
        }
    }

    private function attachPartners(Proposal $proposal): void
    {
        if (! empty($this->partner_ids)) {
            $proposal->partners()->sync($this->partner_ids);
        }
    }

    private function attachKeywords(Proposal $proposal): void
    {
        if (! empty($this->keywords)) {
            $keywordIds = [];
            foreach ($this->keywords as $keywordName) {
                $trimmedName = trim($keywordName);
                if (! empty($trimmedName)) {
                    $keyword = \App\Models\Keyword::firstOrCreate(['name' => $trimmedName]);
                    $keywordIds[] = $keyword->id;
                }
            }
            $proposal->keywords()->sync($keywordIds);
        } else {
            $proposal->keywords()->detach();
        }
    }

    private function attachSdgs(Proposal $proposal): void
    {
        if (! empty($this->sdg_ids)) {
            $proposal->sdgs()->sync($this->sdg_ids);
        } else {
            $proposal->sdgs()->detach();
        }
    }

    private function attachTargetedIkus(Proposal $proposal): void
    {
        if (! empty($this->targeted_iku_ids)) {
            $proposal->targetedIkus()->sync($this->targeted_iku_ids);
        } else {
            $proposal->targetedIkus()->detach();
        }
    }

    /**
     * Validate budget items against budget group percentage limits.
     * Percentages are calculated based on the budget cap, not the total budget entered.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateBudgetGroupPercentages(): void
    {
        if (empty($this->budget_items) || $this->isDraft) {
            return;
        }

        // Get proposal type to determine which budget cap to use
        $proposalType = $this->getProposalType();
        $currentYear = (int) date('Y');

        // Get budget cap for current year and proposal type (with scheme priority)
        $schemeId = $this->research_scheme_id ?: $this->community_service_scheme_id;
        $budgetCap = \App\Models\BudgetCap::getCapForYear($currentYear, $proposalType, (int) $schemeId);

        if ($budgetCap === null || $budgetCap <= 0) {
            // No budget cap set, cannot validate percentages
            throw \Illuminate\Validation\ValidationException::withMessages([
                'budget_items' => [
                    sprintf(
                        'Batas anggaran untuk %s tahun %s belum diatur. Silakan hubungi Admin LPPM.',
                        $proposalType === 'research' ? 'Penelitian' : 'Pengabdian Masyarakat',
                        $currentYear
                    ),
                ],
            ]);
        }

        // Group budget items by budget_group_id and check percentages
        $budgetGroups = \App\Models\BudgetGroup::whereNotNull('percentage')->get();
        $errors = [];

        foreach ($budgetGroups as $group) {
            // Calculate total spent in this group
            $groupTotal = collect($this->budget_items)
                ->where('budget_group_id', $group->id)
                ->sum(fn ($item) => (float) ($item['total'] ?? 0));

            // Calculate percentage used BASED ON BUDGET CAP
            $percentageUsed = ($groupTotal / $budgetCap) * 100;
            $allowedPercentage = (float) $group->percentage;

            // Check if percentage exceeds limit
            if ($percentageUsed > $allowedPercentage) {
                $errors[] = sprintf(
                    'Kelompok anggaran "%s" melebihi batas %s%%. Saat ini: %s%% (Rp %s dari batas anggaran Rp %s)',
                    $group->name,
                    number_format($allowedPercentage, 2),
                    number_format($percentageUsed, 2),
                    number_format($groupTotal, 0, ',', '.'),
                    number_format($budgetCap, 0, ',', '.')
                );
            }
        }

        if (! empty($errors)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'budget_items' => $errors,
            ]);
        }
    }

    /**
     * Validate total budget against year-based budget cap.
     *
     * @param  string  $proposalType  'research' or 'community_service'
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateBudgetCap(string $proposalType): void
    {
        if (empty($this->budget_items)) {
            return;
        }

        // Calculate total budget
        $totalBudget = collect($this->budget_items)->sum(fn ($item) => (float) ($item['total'] ?? 0));

        if ($totalBudget <= 0) {
            return;
        }

        // Get current year
        $currentYear = (int) date('Y');

        // Get budget cap for current year and proposal type (with scheme priority)
        $schemeId = $this->research_scheme_id ?: $this->community_service_scheme_id;
        $budgetCap = \App\Models\BudgetCap::getCapForYear($currentYear, $proposalType, (int) $schemeId);

        if ($budgetCap === null) {
            // No cap set, allow any amount
            return;
        }

        if ($totalBudget > $budgetCap) {
            $typeLabel = $proposalType === 'research' ? 'Penelitian' : 'Pengabdian Masyarakat';
            throw \Illuminate\Validation\ValidationException::withMessages([
                'budget_items' => [
                    sprintf(
                        'Total anggaran melebihi batas maksimal untuk %s tahun %s. Batas: Rp %s, Total saat ini: Rp %s',
                        $typeLabel,
                        $currentYear,
                        number_format($budgetCap, 0, ',', '.'),
                        number_format($totalBudget, 0, ',', '.')
                    ),
                ],
            ]);
        }
    }

    /**
     * Get proposal type from the current form state.
     */
    private function getProposalType(): string
    {
        return $this->research_scheme_id ? 'research' : 'community_service';
    }
}
