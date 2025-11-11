<x-guest-layout>
    <div class="flex items-center justify-start w-full my-6">
        <h1 class="text-black text-xl font-semibold">Create an account</h1>
    </div>

    <form method="POST" action="{{ route('register') }}" id="registerForm" autocomplete="off">
        @csrf

        <!-- Dummy hidden fields to prevent browser autofill :begin -->
        <input type="text" name="fake_username" style="display:none" />
        <input type="password" name="fake_password" style="display:none" />
        <!-- Dummy hidden fields to prevent browser autofill :end -->

        <!-- Name field :begin -->
        <div>
            <x-inputs.input-label for="name" :value="__('Name')" required />
            <x-inputs.text-input id="name" class="mt-1" type="text" name="name" :value="old('name')" required autofocus
                autocomplete="name" placeholder="Full name" />
        </div>
        <!-- Name field :end -->

        <!-- Email Address field :begin -->
        <div class="mt-4">
            <x-inputs.input-label for="email" :value="__('Email')" required />
            <x-inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" placeholder="example@mail.com" />
        </div>
        <!-- Email Address field :end -->

        <!-- Password field :begin -->
        <div class="mt-4">
            <x-inputs.input-label for="password" :value="__('Password')" required />
            <x-inputs.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" placeholder="Secure password" />
        </div>
        <!-- Password field :end -->

        <!-- Confirm Password field :begin -->
        <div class="mt-4">
            <x-inputs.input-label for="password_confirmation" :value="__('Confirm Password')" required />
            <x-inputs.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Re-type your password" />
        </div>
        <!-- Confirm Password field :end -->

        <!-- Submit Button :begin -->
        <x-buttons.default-button type="submit" class="mt-6">
            {{ __('Register') }}
        </x-buttons.default-button>
        <!-- Submit Button :end -->
    </form>

    @push('scripts')
    @vite(['resources/js/auth/register.js'])
    @endpush
</x-guest-layout>