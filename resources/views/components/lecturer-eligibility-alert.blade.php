@php
    $user = auth()->user();
    $eligibility = ['eligible' => true, 'reasons' => []];
    $scheduleInfo = ['research_open' => false, 'pkm_open' => false, 'research_schemes' => [], 'pkm_schemes' => []];
    $schemeEligible = true;
    $schemeReasons = [];

    // Hanya cek jika yang login adalah dosen
    if ($user && $user->activeHasRole('dosen')) {
        $eligibility = app(\App\Services\LecturerEligibilityService::class)->checkEligibility($user);
        $scheduleInfo = app(\App\Services\LecturerEligibilityService::class)->getScheduleStatus($user);

        // Cek eligibilitas skema
        $hasResearchSchemes = !empty($scheduleInfo['research_schemes']);
        $hasPkmSchemes = !empty($scheduleInfo['pkm_schemes']);

        if ($scheduleInfo['research_open'] && !$hasResearchSchemes) {
            $schemeEligible = false;
            $schemeReasons[] = 'Anda tidak memenuhi syarat untuk skema penelitian manapun.';
        }
        if ($scheduleInfo['pkm_open'] && !$hasPkmSchemes) {
            $schemeEligible = false;
            $schemeReasons[] = 'Anda tidak memenuhi syarat untuk skema pengabdian manapun.';
        }
    }
@endphp

@if (!$eligibility['eligible'])
    <!-- Premium Eligibility Alert - Kewajiban Laporan -->
    <div class="card bg-danger-lt border-danger shadow-sm mb-4 overflow-hidden border-0 border-start border-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar bg-danger text-danger-fg shadow-sm">
                        <i class="ti ti-alert-triangle fs-2"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 class="fw-bold text-danger mb-1">Status Kelayakan Pengajuan: Tidak Memenuhi Syarat</h4>
                    <div class="text-danger">
                        Sistem mendeteksi kewajiban yang belum terpenuhi dari periode sebelumnya
                        ({{ ucfirst($eligibility['period']['checked_semester']) }}
                        {{ $eligibility['period']['checked_year'] }}):
                        <ul class="mb-0 mt-2 p-0 ms-3" style="list-style-type: disc;">
                            @foreach ($eligibility['reasons'] as $reason)
                                <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                        <div class="mt-2 small">
                            <strong>Tindakan:</strong> Penuhi laporan akhir dan komponen luaran wajib sebelum mengajukan
                            proposal periode {{ ucfirst($eligibility['period']['current_semester']) }}
                            {{ $eligibility['period']['current_year'] }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif (!$schemeEligible)
    <!-- Scheme Eligibility Alert -->
    <div class="card bg-warning-lt border-warning shadow-sm mb-4 overflow-hidden border-0 border-start border-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar bg-warning text-warning-fg shadow-sm">
                        <i class="ti ti-school fs-2"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 class="fw-bold text-warning mb-1">Status Eligibilitas Skema: Tidak Memenuhi Syarat</h4>
                    <div class="text-warning">
                        Meskipun jadwal pengajuan dibuka, Anda tidak memenuhi syarat untuk skema berikut:
                        <ul class="mb-0 mt-2 p-0 ms-3" style="list-style-type: disc;">
                            @foreach ($schemeReasons as $reason)
                                <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                        <div class="mt-2 small">
                            <strong>Kemungkinan penyebab:</strong> Skor SINTA/Jabatan Fungsional tidak memenuhi ketentuan
                            skema. Silakan hubungi Admin LPPM untuk informasi lebih lanjut.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif