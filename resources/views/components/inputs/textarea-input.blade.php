@props(['disabled' => false, 'value' => ''])

<textarea @disabled($disabled) {{ $attributes->merge([
'class' => 'block border border-pale-silver/50 py-3 focus:border-blaze-orange transition-colors
focus:ring-0 focus:outline-none peer appearance-none text-sm shadow-inner rounded-lg
text-eerie-black placeholder:text-spanish-grey'
]) }}
name="{{ $attributes['name'] }}" >{{ old($attributes->get('name'), $value) }}</textarea>