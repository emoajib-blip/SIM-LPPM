<?php

namespace App\Livewire\Abstracts;

use App\Livewire\Concerns\HasToast;
use App\Livewire\Forms\ProposalForm;
use App\Livewire\Traits\WithProposalWizard;
use App\Livewire\Traits\WithStepWizard;
use App\Services\BudgetValidationService;
use App\Services\MasterDataService;
use App\Services\ProposalService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * @property-read \Illuminate\Support\Collection $schemes
 * @property-read \Illuminate\Support\Collection $communityServiceSchemes
 * @property-read \Illuminate\Support\Collection $focusAreas
 * @property-read \Illuminate\Support\Collection $themes
 * @property-read \Illuminate\Support\Collection $topics
 * @property-read \Illuminate\Support\Collection $nationalPriorities
 * @property-read \Illuminate\Support\Collection $scienceClusters
 * @property-read \Illuminate\Support\Collection $clusterLevel1Options
 * @property-read \Illuminate\Support\Collection $clusterLevel2Options
 * @property-read \Illuminate\Support\Collection $clusterLevel3Options
 * @property-read \Illuminate\Support\Collection $macroResearchGroups
 * @property-read \Illuminate\Support\Collection $partners
 * @property-read \Illuminate\Support\Collection $masterIkus
 * @property-read \Illuminate\Support\Collection $sdgs
 * @property-read \Illuminate\Support\Collection $budgetGroups
 * @property-read \Illuminate\Support\Collection $budgetComponents
 * @property-read \Illuminate\Support\Collection $tktTypes
 * @property-read string|null $templateUrl
 * @property-read string|null $partnerCommitmentTemplateUrl
 * @property-read string|null $proposalApprovalPageTemplateUrl
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
abstract class ProposalCreate extends Component
{
    use \App\Livewire\Traits\HasReportTemplates;
    use HasToast;
    use WithFileUploads;
    use WithProposalWizard;
    use WithStepWizard;

    public ProposalForm $form;

    public int $currentStep = 1;

    public int $fileInputIteration = 0;

    public string $author_name = '';

    public array $budgetValidationErrors = [];

    /** Mode modal mitra: 'existing' (pilih yang ada) atau 'new' (buat baru) */
    public string $partnerMode = 'existing';

    /** Kata kunci pencarian mitra existing di modal */
    public string $partnerSearch = '';

    /** ID mitra yang sedang di-upload surat kesediaannya */
    public ?string $commitmentUploadPartnerId = null;

    /** File surat kesediaan yang akan diupload */
    public $commitmentUploadFile = null;

    public function mount(?string $proposalId = null, ?\App\Models\Proposal $proposal = null): void
    {
        $user = Auth::user();
        $this->author_name = ($user instanceof \App\Models\User) ? $user->name : '';

        // Handle route model binding (if passed as object) or ID string
        $proposalToLoad = $proposal ?? ($proposalId ? \App\Models\Proposal::find($proposalId) : null);

        if ($proposalToLoad) {
            if (! $this->canEditProposal($proposalToLoad)) {
                abort(403);
            }

            $this->form->setProposal($proposalToLoad);
        } else {
            // Initial values for new proposals
            $this->form->start_year = date('Y');

            // Add initial empty budget row
            if (empty($this->form->budget_items)) {
                $this->addBudgetItem();
            }
        }
    }

    protected function canEditProposal(\App\Models\Proposal $proposal): bool
    {
        $user = Auth::user();

        if ($user instanceof \App\Models\User && $user->hasRole(['admin lppm', 'admin lppm saintek', 'admin lppm dekabita'])) {
            return true;
        }

        return $proposal->status === \App\Enums\ProposalStatus::DRAFT
            && $proposal->submitter_id === $user->getAuthIdentifier();
    }

    abstract protected function getProposalType(): string;

    abstract protected function getIndexRoute(): string;

    abstract protected function getShowRoute(string $proposalId): string;

    abstract protected function getStep2Rules(): array;

    protected function getOutputValidationRules(): array
    {
        return [
            'form.outputs' => [
                'required',
                'array',
                'min:1',
                function ($attribute, $value, $fail) {
                    $wajibCount = collect($value)->where('category', 'Wajib')->count();
                    if ($wajibCount < 1) {
                        $fail('Minimal harus ada 1 luaran wajib untuk proposal penelitian.');
                    }
                },
            ],
            'form.outputs.*.year' => 'required|integer|min:1|max:10',
            'form.outputs.*.category' => ['required', \Illuminate\Validation\Rule::in(\App\Constants\ProposalConstants::OUTPUT_CATEGORIES)],
            'form.outputs.*.group' => ['required', \Illuminate\Validation\Rule::in(\App\Constants\ProposalConstants::RESEARCH_OUTPUT_GROUPS)],
            'form.outputs.*.type' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Validate type matches group
                    $index = (int) explode('.', $attribute)[2];
                    $group = $this->form->outputs[$index]['group'] ?? null;
                    if ($group && isset(\App\Constants\ProposalConstants::RESEARCH_OUTPUT_TYPES[$group])) {
                        if (! in_array($value, \App\Constants\ProposalConstants::RESEARCH_OUTPUT_TYPES[$group])) {
                            $fail('Luaran baris '.($index + 1).' tidak valid untuk kategori yang dipilih.');
                        }
                    }
                },
            ],
            'form.outputs.*.status' => ['required', \Illuminate\Validation\Rule::in(\App\Constants\ProposalConstants::OUTPUT_STATUSES)],
            'form.outputs.*.description' => 'required|string|max:2000',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'form.title' => 'Judul',
            'form.research_scheme_id' => 'Skema Penelitian',
            'form.community_service_scheme_id' => 'Skema Pengabdian',
            'form.focus_area_id' => 'Bidang Fokus',
            'form.theme_id' => 'Tema',
            'form.topic_id' => 'Topik',
            'form.keywords' => 'Kata Kunci',
            'form.national_priority_id' => 'Prioritas Riset Nasional',
            'form.cluster_level1_id' => 'Rumpun Ilmu Level 1',
            'form.cluster_level2_id' => 'Rumpun Ilmu Level 2',
            'form.cluster_level3_id' => 'Rumpun Ilmu Level 3',
            'form.sbk_value' => 'Nilai SBK',
            'form.duration_in_years' => 'Lama Kegiatan',
            'form.start_year' => 'Tahun Usulan',
            'form.summary' => 'Ringkasan',
            'form.author_tasks' => 'Tugas Ketua',
            'form.tkt_type' => 'Jenis TKT',
            'form.macro_research_group_id' => 'Kelompok Makro Riset',
            'form.substance_file' => 'Substansi Usulan (PDF)',
            'form.approval_file' => 'Lembar Pengesahan (PDF)',
            'form.outputs' => 'Luaran Target Capaian',
            'form.budget_items' => 'RAB',
            'form.partner_ids' => 'Mitra',
            'form.new_partner.name' => 'Nama Mitra',
            'form.new_partner.email' => 'Email Mitra',
            'form.new_partner.institution' => 'Institusi Mitra',
            'form.new_partner.country' => 'Negara Mitra',
            'form.new_partner.type' => 'Jenis Mitra',
            'form.new_partner.address' => 'Alamat Mitra',
            'form.new_partner_commitment_file' => 'Surat Kesanggupan Mitra',
        ];
    }

    protected function getProposalTypeForValidation(): string
    {
        return $this->getProposalType();
    }

    #[On('members-updated')]
    public function updateMembers(array $members): void
    {
        $this->form->members = $members;
    }

    public function updatedFormFocusAreaId(): void
    {
        $this->form->theme_id = '';
        $this->form->topic_id = '';
    }

    public function updatedFormThemeId(): void
    {
        $this->form->topic_id = '';
    }

    public function updatedFormClusterLevel1Id(): void
    {
        $this->form->cluster_level2_id = '';
        $this->form->cluster_level3_id = '';
    }

    public function updatedFormClusterLevel2Id(): void
    {
        $this->form->cluster_level3_id = '';
    }

    public function updateTktResults(array $tktResults): void
    {
        $this->form->tkt_results = $tktResults;
    }

    #[On('tkt-calculated')]
    public function onTktCalculated(array $levelResults, array $indicatorScores): void
    {
        // Only update level results with levels that have actual progress (percentage > 0)
        $filteredResults = array_filter($levelResults, fn ($data) => ($data['percentage'] ?? 0) > 0);
        $this->form->tkt_results = $filteredResults;
        $this->form->tkt_indicator_scores = $indicatorScores;
    }

    public function save(): void
    {
        $this->form->validate();

        $schemeId = $this->getProposalType() === 'research'
            ? (int) $this->form->research_scheme_id
            : (int) $this->form->community_service_scheme_id;

        app(BudgetValidationService::class)->validateBudgetGroupPercentages(
            $this->form->budget_items,
            $this->getProposalType(),
            null,
            $schemeId
        );

        app(BudgetValidationService::class)->validateBudgetCap(
            $this->form->budget_items,
            $this->getProposalType(),
            null,
            $schemeId
        );

        if ($this->form->proposal) {
            app(ProposalService::class)->updateProposal(
                $this->form->proposal,
                $this->form
            );
            $proposal = $this->form->proposal;
            $message = 'Proposal berhasil diperbarui.';
        } else {
            $proposal = app(ProposalService::class)->createProposal(
                $this->form,
                $this->getProposalType()
            );
            $message = 'Proposal berhasil dibuat.';
        }

        session()->flash('success', $message);
        $this->toastSuccess($message);

        $this->redirect($this->getShowRoute($proposal->id));
    }

    public function saveDraft(): void
    {
        // Validate only the current step
        $rules = $this->getStepValidationRules($this->currentStep);
        if (! empty($rules)) {
            $this->validate($rules);
        }

        // Additional validation for budget in step 3 if items are present
        if ($this->currentStep === 3 && ! empty($this->form->budget_items)) {
            $schemeId = $this->getProposalType() === 'research'
                ? (int) $this->form->research_scheme_id
                : (int) $this->form->community_service_scheme_id;

            app(BudgetValidationService::class)->validateBudgetGroupPercentages(
                $this->form->budget_items,
                $this->getProposalType(),
                null,
                $schemeId
            );

            app(BudgetValidationService::class)->validateBudgetCap(
                $this->form->budget_items,
                $this->getProposalType(),
                null,
                $schemeId
            );
        }

        if ($this->form->proposal) {
            app(ProposalService::class)->updateProposal(
                $this->form->proposal,
                $this->form,
                false // Disable global validation
            );
        } else {
            $proposal = app(ProposalService::class)->createProposal(
                $this->form,
                $this->getProposalType()
            );
            $this->form->proposal = $proposal;
        }

        // Force clear file input and reset iteration to clear frontend state
        $this->form->substance_file = null;
        $this->fileInputIteration++;

        $message = 'Draft proposal berhasil disimpan.';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    #[Computed]
    public function schemes()
    {
        return app(MasterDataService::class)->schemes();
    }

    #[Computed]
    public function communityServiceSchemes()
    {
        return app(MasterDataService::class)->communityServiceSchemes();
    }

    #[Computed]
    public function focusAreas()
    {
        return app(MasterDataService::class)->focusAreas($this->getProposalType());
    }

    #[Computed]
    public function themes()
    {
        return app(MasterDataService::class)->themes($this->form->focus_area_id ? (int) $this->form->focus_area_id : null, $this->getProposalType());
    }

    #[Computed]
    public function topics()
    {
        return app(MasterDataService::class)->topics(
            $this->form->focus_area_id ? (int) $this->form->focus_area_id : null,
            $this->form->theme_id ? (int) $this->form->theme_id : null,
            $this->getProposalType()
        );
    }

    #[Computed]
    public function nationalPriorities()
    {
        return app(MasterDataService::class)->nationalPriorities();
    }

    #[Computed]
    public function scienceClusters()
    {
        return app(MasterDataService::class)->scienceClusters($this->getProposalType());
    }

    #[Computed]
    public function clusterLevel1Options()
    {
        return app(MasterDataService::class)->clusterLevel1Options($this->getProposalType());
    }

    #[Computed]
    public function clusterLevel2Options()
    {
        return app(MasterDataService::class)->clusterLevel2Options($this->form->cluster_level1_id ? (int) $this->form->cluster_level1_id : null, $this->getProposalType());
    }

    #[Computed]
    public function clusterLevel3Options()
    {
        return app(MasterDataService::class)->clusterLevel3Options($this->form->cluster_level2_id ? (int) $this->form->cluster_level2_id : null, $this->getProposalType());
    }

    #[Computed]
    public function macroResearchGroups()
    {
        return app(MasterDataService::class)->macroResearchGroups();
    }

    #[Computed]
    public function partners()
    {
        return app(MasterDataService::class)->partners();
    }

    #[Computed]
    public function masterIkus()
    {
        return app(MasterDataService::class)->masterIkus();
    }

    #[Computed]
    public function sdgs()
    {
        return app(MasterDataService::class)->sdgs();
    }

    #[Computed]
    public function budgetGroups()
    {
        return app(MasterDataService::class)->budgetGroups();
    }

    #[Computed]
    public function budgetComponents()
    {
        return app(MasterDataService::class)->budgetComponents();
    }

    #[Computed]
    public function tktTypes()
    {
        return app(MasterDataService::class)->tktTypes($this->getProposalType());
    }

    #[Computed]
    public function templateUrl()
    {
        return app(MasterDataService::class)->getTemplateUrl($this->getProposalType());
    }

    #[Computed]
    public function partnerCommitmentTemplateUrl()
    {
        return app(MasterDataService::class)->getTemplateUrl('partner-commitment');
    }

    public function downloadPartnerCommitmentTemplate()
    {
        $url = $this->partnerCommitmentTemplateUrl;
        if (! $url) {
            $this->toastError('Template belum tersedia.');

            return;
        }

        $setting = \App\Models\Setting::where('key', 'partner_commitment_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }

        return redirect($url);
    }

    #[Computed]
    public function proposalApprovalPageTemplateUrl()
    {
        return app(MasterDataService::class)->getTemplateUrl('proposal-approval-page');
    }

    public function downloadProposalApprovalPageTemplate()
    {
        $setting = \App\Models\Setting::where('key', 'proposal_approval_page_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }

        $this->toastError('Template belum tersedia.');

    }

    protected function getStepValidationRules(int $step): array
    {
        $type = $this->getProposalType();

        return match ($step) {
            1 => [
                'form.title' => 'required|string|max:255',
                'form.research_scheme_id' => $type === 'research' ? 'required|exists:research_schemes,id' : 'nullable|exists:research_schemes,id',
                'form.focus_area_id' => 'required|exists:focus_areas,id',
                'form.theme_id' => 'required|exists:themes,id',
                'form.topic_id' => 'required|exists:topics,id',
                'form.keywords' => 'required|array|min:1|max:5',
                'form.sdg_ids' => 'required|array|min:1',
                'form.targeted_iku_ids' => 'required|array|min:1',
                'form.national_priority_id' => 'nullable|exists:national_priorities,id',
                'form.cluster_level1_id' => 'required|exists:science_clusters,id',
                'form.cluster_level2_id' => 'nullable|exists:science_clusters,id',
                'form.cluster_level3_id' => 'nullable|exists:science_clusters,id',
                'form.sbk_value' => 'nullable|numeric|min:0',
                'form.duration_in_years' => 'required|integer|min:1|max:10',
                'form.start_year' => 'required|integer|min:2020|max:2050',
                'form.summary' => 'required|string|min:100',
                'form.author_tasks' => 'required|string',
                'form.tkt_type' => $type === 'research' ? ['required', 'string', 'max:255', \Illuminate\Validation\Rule::in(app(\App\Services\MasterDataService::class)->tktTypes()->toArray())] : 'nullable',
                'form.tkt_results' => $type === 'research' ? [
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
                        if ($this->form->research_scheme_id) {
                            $scheme = \App\Models\ResearchScheme::find($this->form->research_scheme_id);
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
                ] : 'nullable',
                'form.eligibility_check' => [
                    function ($attribute, $value, $fail) {
                        $schemeId = $this->getProposalType() === 'research'
                        ? $this->form->research_scheme_id
                        : $this->form->community_service_scheme_id;

                        if (! $schemeId) {
                            return;
                        }

                        $scheme = $this->getProposalType() === 'research'
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
            ],
            2 => array_merge($this->getStep2Rules(), $type === 'research' ? [
                'form.outputs' => [
                    'required',
                    'array',
                    'min:1',
                    function ($attribute, $value, $fail) {
                        $wajibCount = collect($value)->where('category', 'Wajib')->count();
                        if ($wajibCount < 1) {
                            $fail('Minimal harus ada 1 luaran wajib untuk proposal penelitian.');
                        }

                        // Validate each row has required fields
                        foreach ($value as $index => $item) {
                            $rowNum = $index + 1;
                            $errors = [];

                            if (empty($item['group'])) {
                                $errors[] = 'Kategori Luaran';
                            }
                            if (empty($item['type'])) {
                                $errors[] = 'Luaran';
                            }
                            if (empty($item['status'])) {
                                $errors[] = 'Status';
                            }

                            if (! empty($errors)) {
                                $fail("Baris {$rowNum}: ".implode(', ', $errors).' wajib diisi.');
                            }
                        }
                    },
                ],
            ] : []),
            3 => [
                'form.budget_items' => ['required', 'array', 'min:1'],
                'form.budget_items.*.year' => 'required|integer|min:1|max:10',
                'form.budget_items.*.budget_group_id' => 'required|exists:budget_groups,id',
                'form.budget_items.*.budget_component_id' => 'required|exists:budget_components,id',
                'form.budget_items.*.item' => 'required|string|max:255',
                'form.budget_items.*.volume' => 'required|numeric|min:0.01',
                'form.budget_items.*.unit_price' => 'required|numeric|min:1',
            ],
            4 => [
                'form.partner_ids' => 'nullable|array',
                'form.partner_ids.*' => 'exists:partners,id',
            ],
            default => [],
        };
    }

    public function render()
    {
        // dump("Rendering ProposalCreate, Auth check: " . (Auth::check() ? 'Yes' : 'No'));
        return view($this->getProposalType() === 'research' ? 'livewire.research.proposal.create' : 'livewire.community-service.proposal.create');
    }
}
