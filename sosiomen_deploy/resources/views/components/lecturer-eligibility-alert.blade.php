@php
    $user = auth()->user();
    $eligibility = ['eligible' => true, 'reasons' => []];
    
    // Hanya cek jika yang login adalah dosen
    if ($user && $user->activeHasRole('dosen')) {
        $eligibility = app(\App\Services\LecturerEligibilityService::class)->checkEligibility($user);
    }
@endphp

@if (!$eligibility['eligible'])
    <!-- Premium Eligibility Alert -->
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
                        Sistem mendeteksi kewajiban yang belum terpenuhi dari periode sebelumnya ({{ ucfirst($eligibility['period']['checked_semester']) }} {{ $eligibility['period']['checked_year'] }}):
                        <ul class="mb-0 mt-2 p-0 ms-3" style="list-style-type: disc;">
                            @foreach ($eligibility['reasons'] as $reason)
                                <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                        <div class="mt-2 small">
                            <strong>Tindakan:</strong> Penuhi laporan akhir dan komponen luaran wajib sebelum mengajukan proposal periode {{ ucfirst($eligibility['period']['current_semester']) }} {{ $eligibility['period']['current_year'] }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
