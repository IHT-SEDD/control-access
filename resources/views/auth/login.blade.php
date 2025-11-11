<x-guest-layout>
    <div class="flex items-center justify-start w-full my-6">
        <h1 class="text-black text-xl font-semibold">Access your account</h1>
    </div>

    <!-- Session Status :begin -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Session Status :end -->

    <form method="POST" action="{{ route('login') }}" id="loginForm" autocomplete="off">
        @csrf

        <!-- Dummy hidden fields to prevent browser autofill :begin -->
        <input type="text" name="fakeusernameremembered" style="display:none" autocomplete="off">
        <input type="password" name="fakepasswordremembered" style="display:none" autocomplete="off">
        <!-- Dummy hidden fields to prevent browser autofill :end -->

        <!-- Email Address :begin -->
        <div>
            <x-inputs.input-label for="email" :value="__('Email')" required />
            <x-inputs.text-input id="email" name="email" type="email" required placeholder="example@mail.com" readonly
                onfocus="this.removeAttribute('readonly');" autocomplete="off" class="mt-1" />
            <x-inputs.validation-error id="email-error" />
        </div>
        <!-- Email Address :end -->

        <!-- Password :begin -->
        <div class="mt-4">
            <x-inputs.input-label for="password" :value="__('Password')" required />
            <x-inputs.text-input id="password" name="password" type="password" required placeholder="Secure password"
                readonly onfocus="this.removeAttribute('readonly');" autocomplete="off" class="mt-1" />
        </div>
        <!-- Password :end -->

        <div class="flex items-center justify-between mt-6">
            <!-- Remember Me :begin -->
            <div>
                <label for="remember_me" class="inline-flex items-center text-sm text-eerie-black">
                    <x-inputs.checkbox-input id="remember_me" name="remember" :checked="old('remember')" />
                    <span class="ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>
            <!-- Remember Me :end -->

            <!-- Forgot Password :begin -->
            @if (Route::has('password.request'))
            <x-link href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </x-link>
            @endif
            <!-- Forgot Password :end -->
        </div>


        <!-- Submit Button :begin -->
        <x-buttons.default-button type="submit" class="mt-6">
            {{ __('Login') }}
        </x-buttons.default-button>
        <!-- Submit Button :end -->
    </form>

    @push('scripts')
    @vite(['resources/js/auth/login.js'])
    @endpush
</x-guest-layout>