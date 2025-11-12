@props(['disabled' => false, 'type' => 'button'])

<button @disabled($disabled) type="{{ $type }}" {{ $attributes->merge([
    'class' => '
    inline-flex
    items-center
    justify-center
    px-2
    py-2
    sm:px-3
    sm:py-2
    lg:px-4
    lg:py-3
    rounded-lg
    shadow-sm
    font-semibold
    text-xs
    sm:text-sm
    lg:text-mid-sm
    tracking-widest
    text-white
    border border-transparent
    focus:outline-none
    transition
    ease-in-out
    duration-200
    disabled:pointer-events-none
    disabled:opacity-50
    disabled:shadow-none
    '
    ]) }}
    >
    {{ $slot }}
</button>