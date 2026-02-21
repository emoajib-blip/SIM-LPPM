@props([
    'title' => 'Smart Insight',
    'badge' => 'AI Analysis',
    'icon' => 'dna',
    'variant' => 'primary',
    'description' => ''
])

@php
    $variantClass = "border-{$variant}-subtle bg-{$variant}-lt";
    $avatarClass = "bg-{$variant} text-{$variant}-fg";
    $badgeClass = "bg-{$variant}-lt";
    $iconColor = "text-{$variant}";
@endphp

<div {{ $attributes->merge(['class' => "card {$variantClass} shadow-sm bg-opacity-10 overflow-hidden"]) }}>
    <div class="card-body py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-md-auto text-center mb-3 mb-md-0">
                <div class="avatar avatar-xl {{ $avatarClass }} shadow-lg">
                    <i class="ti ti-{{ $icon }} fs-1"></i>
                </div>
            </div>
            <div class="col">
                <h3 class="fw-bold mb-1 d-flex align-items-center">
                    {{ $title }} 
                    @if($badge)
                        <span class="badge {{ $badgeClass }} ms-2 py-1 px-2 font-weight-normal">{{ $badge }}</span>
                    @endif
                </h3>
                <p class="text-secondary mb-3">
                    {{ $description }}
                </p>
                <div class="d-flex flex-wrap gap-2">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="position-absolute end-0 top-0 opacity-05 p-4 d-none d-lg-block">
            <i class="ti ti-{{ $icon }}" style="font-size: 8rem !important; transform: rotate(-15deg);"></i>
        </div>
    </div>
</div>
