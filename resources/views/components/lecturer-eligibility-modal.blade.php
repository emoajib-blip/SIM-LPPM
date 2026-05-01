@php
    $user = auth()->user();
    $eligibility = ['eligible' => true, 'reasons' => [], 'schedule' => []];
    $userSintaScore = null;
    $userFunctionalPosition = null;
    $allResearchSchemeRequirements = [];
    $allPkmSchemeRequirements = [];
    $hasSubmittableProposals = false;

    // Hanya cek jika yang login adalah dosen
    if ($user && $user->activeHasRole('dosen')) {
        $eligibility = app(\App\Services\LecturerEligibilityService::class)->checkEligibility($user);

        // Get user profile info
        $identity = $user->identity;
        $userSintaScore = $identity?->sinta_score_v3_overall ?? 0;
        $userFunctionalPosition = $identity?->functional_position ?? 'Tenaga Pengajar';

        // Get ALL scheme requirements for research (not just eligible ones)
        $researchSchemesAll = \App\Models\ResearchScheme::all();
        foreach ($researchSchemesAll as $scheme) {
            $rules = $scheme->eligibility_rules ?? [];
            if (!empty($rules)) {
                $allResearchSchemeRequirements[] = [
                    'name' => $scheme->name,
                    'min_sinta' => $rules['min_sinta_score'] ?? null,
                    'min_scopus' => $rules['min_scopus_score'] ?? null,
                    'allowed_positions' => $rules['allowed_functional_positions'] ?? [],
                ];
            }
        }

        // Get ALL scheme requirements for PKM
        $pkmSchemesAll = \App\Models\CommunityServiceScheme::all();
        foreach ($pkmSchemesAll as $scheme) {
            $rules = $scheme->eligibility_rules ?? [];
            if (!empty($rules)) {
                $allPkmSchemeRequirements[] = [
                    'name' => $scheme->name,
                    'min_sinta' => $rules['min_sinta_score'] ?? null,
                    'min_scopus' => $rules['min_scopus_score'] ?? null,
                    'allowed_positions' => $rules['allowed_functional_positions'] ?? [],
                ];
            }
        }

        // Check if user has submittable proposals (drafts, need assignment, revision needed)
        $submittableStatuses = [
            \App\Enums\ProposalStatus::DRAFT,
            \App\Enums\ProposalStatus::NEED_ASSIGNMENT,
            \App\Enums\ProposalStatus::REVISION_NEEDED,
        ];

        $hasSubmittableProposals = \App\Models\Proposal::where('submitter_id', $user->id)
            ->whereIn('status', $submittableStatuses)
            ->exists();
    }

    // Cek eligibilitas skema
    $researchSchemes = $eligibility['schedule']['research_schemes'] ?? [];
    $pkmSchemes = $eligibility['schedule']['pkm_schemes'] ?? [];
    $researchOpen = $eligibility['schedule']['research_open'] ?? false;
    $pkmOpen = $eligibility['schedule']['pkm_open'] ?? false;
    $hasNoResearchSchemes = $researchOpen && empty($researchSchemes);
    $hasNoPkmSchemes = $pkmOpen && empty($pkmSchemes);

    // Function to check if user meets requirements
    $checkEligibility = function ($requirements, $sintaScore, $position) {
        foreach ($requirements as $req) {
            $sintaOk = $req['min_sinta'] === null || $sintaScore >= $req['min_sinta'];
            $positionOk = empty($req['allowed_positions']) || in_array($position, $req['allowed_positions']);
            if ($sintaOk && $positionOk) {
                return true;
            }
        }
        return false;
    };

    $meetsResearchRequirements = !empty($allResearchSchemeRequirements) ? $checkEligibility($allResearchSchemeRequirements, $userSintaScore, $userFunctionalPosition) : true;
    $meetsPkmRequirements = !empty($allPkmSchemeRequirements) ? $checkEligibility($allPkmSchemeRequirements, $userSintaScore, $userFunctionalPosition) : true;

    // Find which requirements user doesn't meet
    $researchFailedReasons = [];
    $pkmFailedReasons = [];

    foreach ($allResearchSchemeRequirements as $req) {
        $issues = [];
        if ($req['min_sinta'] !== null && $userSintaScore < $req['min_sinta']) {
            $issues[] = "SINTA minimal {$req['min_sinta']}";
        }
        if (!empty($req['allowed_positions']) && !in_array($userFunctionalPosition, $req['allowed_positions'])) {
            $positions = implode(', ', $req['allowed_positions']);
            $issues[] = "Jabatan: {$positions}";
        }
        if (!empty($issues)) {
            $researchFailedReasons[$req['name']] = $issues;
        }
    }

    foreach ($allPkmSchemeRequirements as $req) {
        $issues = [];
        if ($req['min_sinta'] !== null && $userSintaScore < $req['min_sinta']) {
            $issues[] = "SINTA minimal {$req['min_sinta']}";
        }
        if (!empty($req['allowed_positions']) && !in_array($userFunctionalPosition, $req['allowed_positions'])) {
            $positions = implode(', ', $req['allowed_positions']);
            $issues[] = "Jabatan: {$positions}";
        }
        if (!empty($issues)) {
            $pkmFailedReasons[$req['name']] = $issues;
        }
    }
@endphp

@if ($user && $user->activeHasRole('dosen'))
    <!-- Button Trigger -->
    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal-eligibility-info">
        <x-lucide-info class="icon" />
        Info Eligibilitas
    </button>

    <!-- Modal -->
    <div class="modal modal-blur fade" id="modal-eligibility-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <x-lucide-info class="icon me-2" />
                        Info Eligibilitas
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <!-- Status Jadwal Pengajuan -->
                    <div class="accordion mb-3" id="accordion-schedule">
                        <div class="accordion-item border-primary shadow-sm rounded">
                            <h2 class="accordion-header" id="heading-schedule">
                                <button class="accordion-button text-primary fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-schedule" aria-expanded="true">
                                    <i class="ti ti-calendar-event me-2"></i>
                                    Status Jadwal Pengajuan LPPM
                                </button>
                            </h2>
                            <div id="collapse-schedule" class="accordion-collapse collapse show">
                                <div class="accordion-body bg-white py-3">
                                    <div class="row g-3">
                                        <!-- Penelitian -->
                                        <div class="col-md-6">
                                            <div
                                                class="p-3 rounded-3 border {{ $eligibility['schedule']['research_open'] ? 'bg-blue-lt border-blue' : 'bg-secondary-lt border-secondary' }}">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div
                                                        class="avatar avatar-xs {{ $eligibility['schedule']['research_open'] ? 'bg-blue text-white' : 'bg-secondary text-white' }} rounded me-2">
                                                        <i class="ti ti-flask"></i>
                                                    </div>
                                                    <div
                                                        class="fw-bold {{ $eligibility['schedule']['research_open'] ? 'text-blue' : 'text-secondary' }}">
                                                        Penelitian</div>
                                                    <span
                                                        class="ms-auto badge {{ $eligibility['schedule']['research_open'] ? 'bg-blue' : 'bg-secondary' }} text-white">
                                                        {{ $eligibility['schedule']['research_open'] ? 'DIBUKA' : 'DITUTUP' }}
                                                    </span>
                                                </div>
                                                <div class="small text-muted mb-2">
                                                    @if($eligibility['schedule']['research_dates']['start'])
                                                        {{ \Carbon\Carbon::parse($eligibility['schedule']['research_dates']['start'])->format('d M') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($eligibility['schedule']['research_dates']['end'])->format('d M Y') }}
                                                    @else
                                                        Jadwal belum dikonfigurasi
                                                    @endif
                                                </div>
                                                @if($eligibility['schedule']['research_open'] && !empty($eligibility['schedule']['research_schemes']))
                                                    <div class="mt-2 pt-2 border-top border-blue">
                                                        <div class="fw-bold small text-blue mb-1">Skema Tersedia:</div>
                                                        <div class="d-flex flex-wrap gap-1">
                                                            @foreach($eligibility['schedule']['research_schemes'] as $scheme)
                                                                <span class="badge bg-blue-lt px-2 py-1"
                                                                    style="font-size: 10px;">{{ $scheme }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @elseif($eligibility['schedule']['research_open'] && empty($eligibility['schedule']['research_schemes']))
                                                    <div class="mt-2 pt-2 border-top border-warning">
                                                        <div class="text-warning small">
                                                            <i class="ti ti-alert-triangle me-1"></i>
                                                            Tidak ada skema yang memenuhi syarat
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- PKM -->
                                        <div class="col-md-6">
                                            <div
                                                class="p-3 rounded-3 border {{ $eligibility['schedule']['pkm_open'] ? 'bg-green-lt border-green' : 'bg-secondary-lt border-secondary' }}">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div
                                                        class="avatar avatar-xs {{ $eligibility['schedule']['pkm_open'] ? 'bg-green text-white' : 'bg-secondary text-white' }} rounded me-2">
                                                        <i class="ti ti-users"></i>
                                                    </div>
                                                    <div
                                                        class="fw-bold {{ $eligibility['schedule']['pkm_open'] ? 'text-green' : 'text-secondary' }}">
                                                        Pengabdian</div>
                                                    <span
                                                        class="ms-auto badge {{ $eligibility['schedule']['pkm_open'] ? 'bg-green' : 'bg-secondary' }} text-white">
                                                        {{ $eligibility['schedule']['pkm_open'] ? 'DIBUKA' : 'DITUTUP' }}
                                                    </span>
                                                </div>
                                                <div class="small text-muted mb-2">
                                                    @if($eligibility['schedule']['pkm_dates']['start'])
                                                        {{ \Carbon\Carbon::parse($eligibility['schedule']['pkm_dates']['start'])->format('d M') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($eligibility['schedule']['pkm_dates']['end'])->format('d M Y') }}
                                                    @else
                                                        Jadwal belum dikonfigurasi
                                                    @endif
                                                </div>
                                                @if($eligibility['schedule']['pkm_open'] && !empty($eligibility['schedule']['pkm_schemes']))
                                                    <div class="mt-2 pt-2 border-top border-green">
                                                        <div class="fw-bold small text-green mb-1">Skema Tersedia:</div>
                                                        <div class="d-flex flex-wrap gap-1">
                                                            @foreach($eligibility['schedule']['pkm_schemes'] as $scheme)
                                                                <span class="badge bg-green-lt px-2 py-1"
                                                                    style="font-size: 10px;">{{ $scheme }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @elseif($eligibility['schedule']['pkm_open'] && empty($eligibility['schedule']['pkm_schemes']))
                                                    <div class="mt-2 pt-2 border-top border-warning">
                                                        <div class="text-warning small">
                                                            <i class="ti ti-alert-triangle me-1"></i>
                                                            Tidak ada skema yang memenuhi syarat
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($eligibility['eligible'] && empty($hasNoResearchSchemes) && empty($hasNoPkmSchemes))
                                <!-- Accordion Eligible -->
                                <div class="accordion" id="accordion-eligible">
                                    <div class="accordion-item bg-success-lt border-success mb-3 rounded shadow-sm">
                                        <h2 class="accordion-header" id="heading-eligible">
                                            <button class="accordion-button text-success fw-bold bg-transparent" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-eligible"
                                                aria-expanded="true">
                                                <x-lucide-check-circle class="icon me-2" />
                                                Status Kewajiban (Eligible)
                                                <span class="badge bg-success ms-auto text-white rounded-pill">Aman</span>
                                            </button>
                                        </h2>
                                        <div id="collapse-eligible" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-0 bg-white rounded-bottom">
                                                <p class="mb-0 pt-3 text-secondary">
                                                    <x-lucide-check class="icon text-success me-1" /> Anda memenuhi syarat
                                                    kewajiban pelaporan untuk mengajukan usulan baru.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ((!empty($hasNoResearchSchemes) || !empty($hasNoPkmSchemes)) && !$hasSubmittableProposals)
                                <!-- Accordion Scheme Ineligible -->
                                <div class="accordion" id="accordion-scheme-ineligible">
                                    <div class="accordion-item bg-warning-lt border-warning mb-3 rounded shadow-sm">
                                        <h2 class="accordion-header" id="heading-scheme-ineligible">
                                            <button class="accordion-button text-warning fw-bold bg-transparent" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-scheme-ineligible"
                                                aria-expanded="true">
                                                <x-lucide-alert-triangle class="icon me-2" />
                                                Status Eligibilitas Skema
                                                <span class="badge bg-warning ms-auto text-white rounded-pill">Tidak
                                                    Tersedia</span>
                                            </button>
                                        </h2>
                                        <div id="collapse-scheme-ineligible" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-0 bg-white rounded-bottom">
                                                <!-- User Current Profile -->
                                                <div class="p-3 bg-info-lt rounded mb-3">
                                                    <div class="fw-bold text-info mb-2"><i class="ti ti-user me-1"></i> Profil
                                                        Anda:</div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="small text-muted">Skor SINTA V3:</div>
                                                            <div class="fw-bold">{{ $userSintaScore ?? '0' }}</div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="small text-muted">Jabatan Fungsional:</div>
                                                            <div class="fw-bold">
                                                                {{ $userFunctionalPosition ?? 'Tenaga Pengajar' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="mb-2 pt-1 text-warning fw-bold">Jadwal terbuka tetapi tidak ada skema
                                                    yang memenuhi syarat:</p>

                                                @if(!empty($hasNoResearchSchemes) && !empty($allResearchSchemeRequirements))
                                                    <div class="mb-3">
                                                        <div class="fw-bold text-warning mb-1">Penelitian - Persyaratan Skema:</div>
                                                        @foreach($researchFailedReasons as $schemeName => $reasons)
                                                            <div class="small text-muted ms-2 mb-1">
                                                                <strong>{{ $schemeName }}:</strong> {{ implode(', ', $reasons) }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if(!empty($hasNoPkmSchemes) && !empty($allPkmSchemeRequirements))
                                                    <div class="mb-3">
                                                        <div class="fw-bold text-warning mb-1">Pengabdian - Persyaratan Skema:</div>
                                                        @foreach($pkmFailedReasons as $schemeName => $reasons)
                                                            <div class="small text-muted ms-2 mb-1">
                                                                <strong>{{ $schemeName }}:</strong> {{ implode(', ', $reasons) }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                <p class="mt-2 mb-0 text-secondary small">
                                                    <i class="ti ti-info-circle me-1"></i>
                                                    Hubungi Admin LPPM jika ada ketidaksesuaian data.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Accordion Ineligible -->
                                <div class="accordion" id="accordion-ineligible-state">
                                    <div class="accordion-item bg-danger-lt border-danger rounded shadow-sm overflow-hidden">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button text-danger fw-bold bg-transparent" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-ineligible-1"
                                                aria-expanded="true">
                                                <x-lucide-x-circle class="icon me-2" />
                                                Kewajiban Belum Terpenuhi
                                                <span
                                                    class="badge bg-danger ms-auto text-white rounded-pill">{{ count($eligibility['reasons']) }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse-ineligible-1" class="accordion-collapse collapse show">
                                            <div class="accordion-body pt-0 bg-white rounded-bottom">
                                                <p class="pt-3 text-secondary fw-bold mb-2">Alasan ketidaklayakan:</p>
                                                <ul class="text-secondary mb-0 ps-3">
                                                    @foreach ($eligibility['reasons'] as $reason)
                                                        <li class="mb-1 text-danger">{{ $reason }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
@endif