@props([
'active' => false,
'route' => null,
])

@php
$isActive = $active;

if (! $isActive && $route) {
if (request()->routeIs($route) || request()->is(str_replace('.', '/', $route) . '*')) {
$isActive = true;
}
}

$linkClasses = $isActive
? 'dropdown-link-active'
: 'dropdown-link';
@endphp

<a {{ $attributes->merge(['class' => "{$linkClasses}"]) }}>
 {{ $slot }}
</a>