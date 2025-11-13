<h1 class=" md:text-xl text-md font-bold text-hot-shot w-full">Add new {{ $title }}</h1>

<form method="POST" action="{{ url('/master/door/add-data') }}" class="ajax-form" id="form-create"
   data-datatable="#door-table" novalidate>
   @csrf
   <div>
      <x-inputs.input-label for="name" :value="__('Name')" required />
      <x-inputs.text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required
         placeholder="New door name" autocomplete="off" />
      <x-inputs.validation-error id="name-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="ip_address" :value="__('IP Address')" required />
      <x-inputs.text-input id="ip_address" class="block mt-2 w-full" type="text" name="ip_address"
         :value="old('ip_address')" required placeholder="IP Address" autocomplete="off" />
      <x-inputs.validation-error id="ip_address-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="select-tower" :value="__('Tower')" required />
      <select id="select-tower" placeholder="Select tower..." autocomplete="off" name="tower_id" class="my-2">
      </select>
      <x-inputs.validation-error id="select-tower-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="select-camera" :value="__('Camera')" required />
      <select id="select-camera" placeholder="Select camera..." autocomplete="off" name="camera_id" class="my-2">
      </select>
      <x-inputs.validation-error id="select-camera-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="username" :value="__('Username')" required />
      <x-inputs.text-input id="username" class="block mt-2 w-full" type="text" name="username" :value="old('username')"
         required placeholder="Username" autocomplete="off" />
      <x-inputs.validation-error id="username-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="password" :value="__('Password')" required />
      <x-inputs.text-input id="password" class="block mt-2 w-full" type="text" name="password" :value="old('password')"
         required placeholder="password" autocomplete="off" />
      <x-inputs.validation-error id="password-error" />
   </div>

   <div class="mt-2">
      <x-inputs.input-label for="auto_lock" :value="__('Auto Lock (Minute)')" />
      <x-inputs.text-input id="auto_lock" class="block mt-2 w-full" type="text" name="auto_lock"
         :value="old('auto_lock')" required placeholder="Auto Lock" autocomplete="off" />
      <x-inputs.validation-error id="auto_lock-error" />
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