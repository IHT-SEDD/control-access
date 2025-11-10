@props([
'href' => '#',
])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'underline text-sm text-eerie-black hover:text-blaze-orange focus:outline-none transition duration-150
    ease-in-out',
    ]) }}
    >
    {{ $slot }}
</a>