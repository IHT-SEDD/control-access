<h1 class=" md:text-xl text-md font-bold text-hot-shot w-full">Add new {{ $title }}</h1>

<form method="POST" action="{{ url('/master/tower/add-data') }}" class="ajax-form" id="form-create"
 data-table="tower-table" novalidate>
 @csrf
 <div>
  <x-inputs.input-label for="name" :value="__('Name')" required />
  <x-inputs.text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required
   placeholder="New door name" autocomplete="off" />
  <x-input-error id="input-name-error"></x-input-error>
 </div>

 <div class="mt-2">
  <x-inputs.input-label for="description" :value="__('Description')" />
  <x-inputs.textarea-input id="description" name="description" class="block mt-2 w-full"
   placeholder="New field description" :value="$field->description ?? ''">
  </x-inputs.textarea-input>
  <x-input-error id="input-description-error"></x-input-error>
 </div>

 <!-- Submit btn -->
 <x-primary-button class="w-full mt-6">
  {{ __('Submit') }}
 </x-primary-button>
</form>