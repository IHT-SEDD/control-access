@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-eerie-black']) }}>
    {{ $value ?? $slot }}
    @if($required)
    <span class="text-ruddy font-medium text-sm">*</span>
    @endif
</label>