@props(['disabled' => false, 'type' => 'button'])

<button @disabled($disabled) type="{{ $type }}" {{ $attributes->merge([
    'class' => '
    w-full
    inline-flex
    items-center
    justify-center
    px-4
    py-3
    rounded-lg
    shadow-sm
    font-semibold
    text-mid-sm
    tracking-widest
    text-white
    bg-blaze-orange/85
    border border-transparent
    hover:bg-blaze-orange
    focus:bg-blaze-orange
    active:bg-blaze-orange
    focus:outline-none
    transition
    ease-in-out
    duration-200
    '
    ]) }}
    >
    {{ $slot }}
</button>