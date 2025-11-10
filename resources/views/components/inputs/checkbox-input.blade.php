@props([
'id' => '',
'name' => '',
'checked' => false,
'disabled' => false,
])

<input type="checkbox" id="{{ $id }}" name="{{ $name }}" @checked($checked) @disabled($disabled) {{ $attributes->merge([
'class' => 'appeareance-none focus:ring-0 shadow-inner focus:outline-0 rounded border-pale-silver/50 text-blaze-orange shadow-sm'
]) }}
>