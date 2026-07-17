@props(['paginator'])

@if ($paginator->hasPages())
    {{ $paginator->links('pagination::tailwind') }}
@endif
