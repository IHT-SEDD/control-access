@props([
'align' => 'right',
'width' => '48',
'contentClasses' => 'p-2 bg-white',
'active' => false,
'route' => null,
])

@php
$alignmentClasses = match ($align) {
'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
'top' => 'origin-top',
default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$width = match ($width) {
'48' => 'w-48',
default => $width,
};

$isActive = $active;

if (! $isActive && $route) {
if (request()->routeIs($route) || request()->is(str_replace('.', '/', $route) . '*')) {
$isActive = true;
}
}

$triggerBaseClass = 'group dropdown-trigger transition-colors duration-200';
$triggerDefaultClass = 'text-sonic-silver hover:text-eerie-black';
$triggerActiveClass = 'border-b-2 border-blaze-orange text-eerie-black';
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <button type="button" @click="open = !open"
        :class="['{{ $triggerBaseClass }}', open ? '!text-eerie-black' : '', '{{ $isActive ? $triggerActiveClass : $triggerDefaultClass }}']">
        {{ $trigger }}
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $width }} rounded-lg shadow-lg {{ $alignmentClasses }}" style="display: none;"
        @click="open = false">
        <div class="rounded-lg ring-1 ring-black ring-opacity-5 space-y-1 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>