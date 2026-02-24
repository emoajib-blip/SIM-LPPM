@props(['items' => []])

@if(!empty($items))
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrows">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate.hover>Home</a></li>
            @foreach($items as $label => $link)
                @if(!$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $link }}" wire:navigate.hover>{{ $label }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif