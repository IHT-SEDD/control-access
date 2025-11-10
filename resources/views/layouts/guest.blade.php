<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ========== Vite Scripts :begin ========== -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <!-- ========== Vite Scripts :end ========== -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex justify-center items-center bg-linen">
        <div class="w-full sm:max-w-md p-6 bg-white shadow-md overflow-hidden rounded-3xl">

            <!-- ========== Button Change Form :begin ========== -->
            <div class="w-full flex flex-row items-center justify-start mb-3">
                <div class="flex flex-row items-center justify-center p-1 bg-linen rounded-full w-fit shadow-inner">

                    <!-- Sign In -->
                    <a href="{{ route('login') }}" id="btn-signin"
                        class="flex items-center justify-center px-5 py-1.5 rounded-full text-sm font-medium text-center transition duration-150 ease-in-out">
                        Sign In
                    </a>

                    <!-- Sign Up -->
                    <a href="{{ route('register') }}" id="btn-signup"
                        class="flex items-center justify-center px-5 py-1.5 rounded-full text-sm font-medium text-center transition duration-150 ease-in-out">
                        Sign Up
                    </a>
                </div>
            </div>
            <!-- ========== Button Change Form :end ========== -->

            {{ $slot }}
        </div>
    </div>

    <!-- ========== Other JS Scripts :begin ========== -->
    <script src="{{ asset('js/guest.js') }}"></script>
    @stack('scripts')
    <!-- ========== Other JS Scripts :end ========== -->
</body>

</html>