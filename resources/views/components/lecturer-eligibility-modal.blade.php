@php
    $user = auth()->user();
    $eligibility = ['eligible' => true, 'reasons' => []];
    
    // Hanya cek jika yang login adalah dosen
    if ($user && $user->activeHasRole('dosen')) {
        $eligibility = app(\App\Services\LecturerEligibilityService::class)->checkEligibility($user);
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
                        <button class="accordion-button text-primary fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-schedule" aria-expanded="true">
                            <i class="ti ti-calendar-event me-2"></i>
                            Status Jadwal Pengajuan LPPM
                        </button>
                    </h2>
                    <div id="collapse-schedule" class="accordion-collapse collapse show">
                        <div class="accordion-body bg-white py-3">
                            <div class="row g-3">
                                <!-- Penelitian -->
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3 border {{ $eligibility['schedule']['research_open'] ? 'bg-blue-lt border-blue' : 'bg-secondary-lt border-secondary' }}">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar avatar-xs {{ $eligibility['schedule']['research_open'] ? 'bg-blue text-white' : 'bg-secondary text-white' }} rounded me-2">
                                                <i class="ti ti-flask"></i>
                                            </div>
                                            <div class="fw-bold {{ $eligibility['schedule']['research_open'] ? 'text-blue' : 'text-secondary' }}">Penelitian</div>
                                            <span class="ms-auto badge {{ $eligibility['schedule']['research_open'] ? 'bg-blue' : 'bg-secondary' }} text-white">
                                                {{ $eligibility['schedule']['research_open'] ? 'DIBUKA' : 'DITUTUP' }}
                                            </span>
                                        </div>
                                        <div class="small text-muted mb-2">
                                            @if($eligibility['schedule']['research_dates']['start'])
                                                {{ \Carbon\Carbon::parse($eligibility['schedule']['research_dates']['start'])->format('d M') }} - {{ \Carbon\Carbon::parse($eligibility['schedule']['research_dates']['end'])->format('d M Y') }}
                                            @else
                                                Jadwal belum dikonfigurasi
                                            @endif
                                        </div>
                                        @if($eligibility['schedule']['research_open'] && !empty($eligibility['schedule']['research_schemes']))
                                            <div class="mt-2 pt-2 border-top border-blue">
                                                <div class="fw-bold small text-blue mb-1">Skema Tersedia:</div>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach($eligibility['schedule']['research_schemes'] as $scheme)
                                                        <span class="badge bg-blue-lt px-2 py-1" style="font-size: 10px;">{{ $scheme }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- PKM -->
                                <div class="col-md-6">
                                    <div class="p-3 rounded-3 border {{ $eligibility['schedule']['pkm_open'] ? 'bg-green-lt border-green' : 'bg-secondary-lt border-secondary' }}">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar avatar-xs {{ $eligibility['schedule']['pkm_open'] ? 'bg-green text-white' : 'bg-secondary text-white' }} rounded me-2">
                                                <i class="ti ti-users"></i>
                                            </div>
                                            <div class="fw-bold {{ $eligibility['schedule']['pkm_open'] ? 'text-green' : 'text-secondary' }}">Pengabdian</div>
                                            <span class="ms-auto badge {{ $eligibility['schedule']['pkm_open'] ? 'bg-green' : 'bg-secondary' }} text-white">
                                                {{ $eligibility['schedule']['pkm_open'] ? 'DIBUKA' : 'DITUTUP' }}
                                            </span>
                                        </div>
                                        <div class="small text-muted mb-2">
                                            @if($eligibility['schedule']['pkm_dates']['start'])
                                                {{ \Carbon\Carbon::parse($eligibility['schedule']['pkm_dates']['start'])->format('d M') }} - {{ \Carbon\Carbon::parse($eligibility['schedule']['pkm_dates']['end'])->format('d M Y') }}
                                            @else
                                                Jadwal belum dikonfigurasi
                                            @endif
                                        </div>
                                        @if($eligibility['schedule']['pkm_open'] && !empty($eligibility['schedule']['pkm_schemes']))
                                            <div class="mt-2 pt-2 border-top border-green">
                                                <div class="fw-bold small text-green mb-1">Skema Tersedia:</div>
                                                <div class="d-flex flex-wrap gap-1">
                                                    @foreach($eligibility['schedule']['pkm_schemes'] as $scheme)
                                                        <span class="badge bg-green-lt px-2 py-1" style="font-size: 10px;">{{ $scheme }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($eligibility['eligible'])
                <!-- Accordion Eligible -->
                <div class="accordion" id="accordion-eligible">
                  <div class="accordion-item bg-success-lt border-success mb-3 rounded shadow-sm">
                    <h2 class="accordion-header" id="heading-eligible">
                      <button class="accordion-button text-success fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-eligible" aria-expanded="true">
                        <x-lucide-check-circle class="icon me-2" />
                        Status Kewajiban (Eligible)
                        <span class="badge bg-success ms-auto text-white rounded-pill">Aman</span>
                      </button>
                    </h2>
                    <div id="collapse-eligible" class="accordion-collapse collapse show">
                      <div class="accordion-body pt-0 bg-white rounded-bottom">
                        <p class="mb-0 pt-3 text-secondary">
                          <x-lucide-check class="icon text-success me-1" /> Anda memenuhi syarat kewajiban pelaporan untuk mengajukan usulan baru.
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
                      <button class="accordion-button text-danger fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-ineligible-1" aria-expanded="true">
                        <x-lucide-x-circle class="icon me-2" />
                        Kewajiban Belum Terpenuhi
                        <span class="badge bg-danger ms-auto text-white rounded-pill">{{ count($eligibility['reasons']) }}</span>
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
