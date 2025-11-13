<h1 class=" md:text-xl text-md font-bold text-hot-shot w-full">Add new {{ $title }}</h1>

<form method="POST" action="{{ url('/master/camera/add-data') }}" class="ajax-form" id="form-create"
 data-table="camera-table" novalidate>
 @csrf
 <div class="mt-2">
  <x-inputs.input-label for="name" :value="__('Name')" required />
  <x-inputs.text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required
   placeholder="New {{ $title }} name" autocomplete="off" />
  <x-inputs.validation-error id="name-error" />
 </div>

 <div class="mt-2">
  <x-inputs.input-label for="initial" :value="__('Initial')" />
  <x-inputs.text-input id="initial" class="block mt-2 w-full" type="text" name="initial" :value="old('initial')"
   placeholder="New {{ $title }} initial" autocomplete="off" />
  <x-inputs.validation-error id="initial-error" />
 </div>

 <div class="flex items-center gap-2">
  <div class="mt-2">
   <x-inputs.input-label for="brand" :value="__('Brand')" required />
   <x-inputs.text-input id="brand" class="block mt-2 w-full" type="text" name="brand" :value="old('brand')" required
    placeholder="New {{ $title }} brand" autocomplete="off" />
   <x-inputs.validation-error id="brand-error" />
  </div>

  <div class="mt-2">
   <x-inputs.input-label for="type" :value="__('Type')" />
   <x-inputs.text-input id="type" class="block mt-2 w-full" type="text" name="type" :value="old('type')"
    placeholder="New {{ $title }} type" autocomplete="off" />
   <x-inputs.validation-error id="type-error" />
  </div>
 </div>

 <div class="flex items-center gap-2">
  <div class="mt-2">
   <x-inputs.input-label for="ip_address" :value="__('IP Address')" required />
   <x-inputs.text-input id="ip_address" class="block mt-2 w-full" type="text" name="ip_address"
    :value="old('ip_address')" required placeholder="New {{ $title }} ip address" autocomplete="off" />
   <x-inputs.validation-error id="ip_address-error" />
  </div>

  <div class="mt-2">
   <x-inputs.input-label for="channel" :value="__('Channel')" required />
   <x-inputs.text-input id="channel" class="block mt-2 w-full" type="text" name="channel" :value="old('channel')"
    required placeholder="New {{ $title }} channel" autocomplete="off" />
   <x-inputs.validation-error id="channel-error" />
  </div>
 </div>

 <div class="mt-2">
  <x-inputs.input-label for="description" :value="__('Description')" />
  <x-inputs.textarea-input id="description" name="description" class="block mt-2 w-full"
   placeholder="New field description" :value="$field->description ?? ''">
  </x-inputs.textarea-input>
  <x-inputs.validation-error id="description-error" />
 </div>

 <div class="mt-2">
  <x-inputs.input-label for="is_active" :value="__('Active?')" required />
  <x-inputs.toggle-input id="is_active" name="is_active" required />
  <x-inputs.validation-error id="is_active-error" />
 </div>

 <!-- Submit btn -->
 <x-primary-button class="w-full mt-6">
  {{ __('Submit') }}
 </x-primary-button>
</form>