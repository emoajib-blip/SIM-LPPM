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
            @if ($eligibility['eligible'])
                <!-- Accordion Eligible -->
                <div class="accordion" id="accordion-eligible">
                  <div class="accordion-item bg-success-lt border-success mb-3 rounded shadow-sm">
                    <h2 class="accordion-header" id="heading-eligible">
                      <button class="accordion-button text-success fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-eligible" aria-expanded="true">
                        <x-lucide-check-circle class="icon me-2" />
                        Status yang Eligible
                        <span class="badge bg-success ms-auto text-white rounded-pill">1</span>
                      </button>
                    </h2>
                    <div id="collapse-eligible" class="accordion-collapse collapse show">
                      <div class="accordion-body pt-0 bg-white rounded-bottom">
                        <p class="mb-0 pt-3 text-secondary">
                          <x-lucide-check class="icon text-success me-1" /> Anda memenuhi syarat penuh untuk mengajukan usulan baru pada periode ini.
                        </p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item bg-danger-lt border-danger rounded shadow-sm">
                    <h2 class="accordion-header" id="heading-ineligible">
                      <button class="accordion-button collapsed text-danger fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-ineligible" aria-expanded="false">
                        <x-lucide-x-circle class="icon me-2" />
                        Status yang Tidak Eligible
                        <span class="badge bg-danger ms-auto text-white rounded-pill">0</span>
                      </button>
                    </h2>
                    <div id="collapse-ineligible" class="accordion-collapse collapse">
                      <div class="accordion-body pt-0 bg-white rounded-bottom">
                        <p class="mb-0 pt-3 text-secondary">Tidak ada kewajiban yang menghalangi pengajuan proposal Anda.</p>
                      </div>
                    </div>
                  </div>
                </div>
            @else
                <!-- Accordion Ineligible -->
                <div class="accordion" id="accordion-ineligible-state">
                  <div class="accordion-item bg-success-lt border-success mb-3 rounded shadow-sm">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed text-success fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-eligible-0" aria-expanded="false">
                        <x-lucide-check-circle class="icon me-2" />
                        Status yang Eligible
                        <span class="badge bg-success ms-auto text-white rounded-pill">0</span>
                      </button>
                    </h2>
                    <div id="collapse-eligible-0" class="accordion-collapse collapse">
                      <div class="accordion-body pt-0 bg-white rounded-bottom">
                        <p class="mb-0 pt-3 text-secondary">Saat ini Anda tidak memiliki status eligible untuk mengajukan usulan baru.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item bg-danger-lt border-danger rounded shadow-sm">
                    <h2 class="accordion-header">
                      <button class="accordion-button text-danger fw-bold bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-ineligible-1" aria-expanded="true">
                        <x-lucide-x-circle class="icon me-2" />
                        Status yang Tidak Eligible
                        <span class="badge bg-danger ms-auto text-white rounded-pill">{{ count($eligibility['reasons']) }}</span>
                      </button>
                    </h2>
                    <div id="collapse-ineligible-1" class="accordion-collapse collapse show">
                      <div class="accordion-body pt-0 bg-white rounded-bottom">
                        <p class="pt-3 text-secondary fw-bold mb-2">Alasan ketidaklayakan (Kewajiban belum terpenuhi):</p>
                        <ul class="text-secondary mb-0 ps-3">
                            @foreach ($eligibility['reasons'] as $reason)
                                <li class="mb-1">{{ $reason }}</li>
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
