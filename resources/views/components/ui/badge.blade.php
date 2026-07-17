@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'bg-light-gray text-slate-dark',
        'primary' => 'bg-academic-blue/10 text-academic-blue',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'danger' => 'bg-danger/10 text-danger',
    ];
    $classes = 'inline-flex items-center px-3 py-1 text-xs font-medium rounded-full ' . ($variants[$variant] ?? $variants['default']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
