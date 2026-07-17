@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'animate-pulse bg-light-gray rounded-lg ' . $class]) }}>
    &nbsp;
</div>
