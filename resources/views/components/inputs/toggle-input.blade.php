@props(['disabled' => false, 'checked' => false])

<label class="relative inline-flex items-center cursor-pointer mt-2">
    <input type="hidden" name="{{ $attributes['name'] }}" value="0">
    <input type="checkbox" class="sr-only peer" value="1" @disabled($disabled) @checked($checked) {{ $attributes }}>

    <div class="relative w-11 h-6 bg-gray-300 rounded-full
                peer-checked:bg-indigo-600
                after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                after:bg-white after:border-gray-400 after:border after:rounded-full
                after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
    </div>
</label>
