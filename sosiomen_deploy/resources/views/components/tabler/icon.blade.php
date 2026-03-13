@props([
    'name' => null,       // nama icon tabler, contoh: 'home', 'user', 'settings'
    'class' => 'icon',    // kelas CSS tambahan
    'size' => '24',       // ukuran icon dalam pixel
    'stroke' => '2',      // ketebalan garis
])
@if ($name)
    @php
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        // Komponen icon wrapper untuk Tabler Icons
        // Gunakan icon CSS class dari Tabler Icons (ti ti-*)
        $iconClass = trim("ti ti-{$name} {$class}");
    @endphp
        <i {{ $attributes->merge(['class' => $iconClass]) }}></i>
@else
    {{-- Fallback: render slot jika tidak ada nama icon --}}
    {{ $slot ?? '' }}
@endif
