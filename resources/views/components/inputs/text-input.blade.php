@props([
'type' => 'text',
'disabled' => false,
'placeholder' => '',
'autocomplete' => false,
'autofocus' => false
])

@php
$allowedTypes = ['text', 'email', 'password'];
$type = in_array($type, $allowedTypes) ? $type : 'text';
@endphp

<input type="{{ $type }}" placeholder="{{ $placeholder }}" @disabled($disabled) @if($autocomplete)
 autocomplete="{{ $autocomplete }}" @endif @if($autofocus) autofocus @endif {{ $attributes->merge([
'class' => 'block w-full py-2.5 text-sm shadow-inner appearance-none bg-transparent rounded-lg
text-eerie-black placeholder:text-spanish-grey focus:outline-none focus:ring-0 border border-pale-silver/50
focus:border-blaze-orange'
]) }}
>