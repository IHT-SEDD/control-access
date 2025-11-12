<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-11.5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="font-mono text-eerie-black bg-linen py-1 px-3 shadow-inner hover:text-blaze-orange rounded-md text-xs sm:text-sm lg:text-base">
                        <span>.control-access</span>
                    </a>
                </div>

                <!-- Navigation Links :begin -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Dashboard -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-dropdown align="left" width="48" route="master.*">
                        <x-slot name="trigger">
                            Master Data
                            <x-heroicon-s-chevron-down class="w-3.5 h-auto transition-transform duration-200"
                                x-bind:class="open ? 'rotate-180 text-eerie-black' : ''" />
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="url('master/door')" route="master/door*">
                                <i data-lucide="dot" class="w-5"></i>
                                Doors
                            </x-dropdown-link>

                            <x-dropdown-link :href="url('master/tower')" route="master/tower*">
                                <i data-lucide="dot" class="w-5"></i>
                                Towers
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                <!-- Navigation Links :end -->
            </div>

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        {{ Auth::user()->name }}
                        <x-heroicon-s-chevron-down class="w-3.5 h-auto transition-transform duration-200"
                            x-bind:class="open ? 'rotate-180 text-eerie-black' : ''" />
                    </x-slot>

                    <x-slot name="content">
                        <!-- Log Out -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">
                                <i data-lucide="log-out" class="w-4"></i>
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-sonic-silver hover:text-eerie-black focus:outline-none transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" stroke="currentColor" fill="none"
                        viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>