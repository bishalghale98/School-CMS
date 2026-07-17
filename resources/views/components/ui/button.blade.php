@props(['variant' => 'primary', 'size' => 'md', 'href' => null, 'type' => 'button'])

@php
    $base = 'inline-flex items-center justify-center font-medium rounded-xl transition-colors focus:outline-none focus:ring-2 focus:ring-academic-blue/50';
    $variants = [
        'primary' => 'text-white bg-academic-blue hover:bg-academic-blue/90',
        'outline' => 'text-academic-blue border-2 border-academic-blue hover:bg-academic-blue/5',
        'ghost' => 'text-slate-dark hover:bg-light-gray',
        'danger' => 'text-white bg-danger hover:bg-danger/90',
    ];
    $sizes = [
        'sm' => 'px-4 h-9 text-sm',
        'md' => 'px-6 h-11 text-sm',
        'lg' => 'px-8 h-12 text-base',
    ];
    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
