<x-app-layout>
 <x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
   {{ __('Master Data of ' . $tittle) }}
  </h2>
 </x-slot>

<div class="grid grid-cols-4 gap-2">
  <!-- TABLE -->
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3">
    <div class="p-4 w-full flex flex-col">
      <x-inputs.text-input id="search-table" name="search" type="text"
        placeholder="Search table" readonly onfocus="this.removeAttribute('readonly');"
        autocomplete="off" class="mt-1 max-w-sm" />

      <div id="tower-table" class="mt-4 tabulator-default flex-1"></div>
    </div>
  </div>

  <!-- FORM -->
  <div class="bg-white shadow-sm sm:rounded-lg">
    <div class="p-4 w-full">
      @include('pages.master-data.tower.add-form')
    </div>
  </div>
</div>


 @push('scripts')
@vite([
    'resources/js/master/tower/index.js',
    'resources/js/utils/global.js'
])
 @endpush
</x-app-layout>
