<x-app-layout>
    <x-slot name="header">
        <h2 class="header-text">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full flex items-center justify-start bg-white rounded-lg p-4 mb-4 shadow-inner">
        <div class="w-full flex items-center justify-start gap-1">
            <x-buttons.door-button
                class="w-fit bg-vivid-malachite/85 hover:bg-vivid-malachite focus:bg-vivid-malachite unlock-all-btn"
                data-action="open">
                Unlock All
            </x-buttons.door-button>
            <x-buttons.door-button class="w-fit bg-ruddy/85 hover:bg-ruddy focus:bg-ruddy lock-all-btn" data-action="close">
                Lock All
            </x-buttons.door-button>
        </div>
    </div>

    <div class="w-full flex flex-col lg:flex-row flex-shrink justify-between items-start gap-4">
        @foreach (['1', '2', '3', '4', '5', '6'] as $doorId)
        <div class="card w-full" id="door-card-{{ $doorId }}">
            <div class="card-title flex-col xs:flex-row gap-2 xs:gap-0">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner w-full xs:w-fit">
                    <h3 class="font-mono text-xs sm:text-sm text-blaze-orange">Door {{ $doorId }} - Tower </h3>
                </div>
                <div class="p-1 rounded-lg bg-ruddy/30 shadow-md w-full xs:w-fit">
                    <h3 class="text-xs sm:text-sm text-ruddy door-status" data-door="{{ $doorId }}">Closed</h3>
                </div>
            </div>

            <div
                class="rounded-lg border border-default bg-linen shadow-inner aspect-video flex items-center justify-center mb-4">
                <video id="preview_cam_{{ $doorId }}" autoplay playsinline muted class="rounded-lg block w-full h-full"
                    data-stream="http://127.0.0.1:8889/TEST{{ $doorId }}/whep"></video>
            </div>

            <div
                class="flex flex-col lg:flex-row items-center justify-center gap-1 p-1 rounded-lg border border-default bg-linen shadow-inner">
                <x-buttons.door-button
                    class="w-full bg-vivid-malachite/85 hover:bg-vivid-malachite focus:bg-vivid-malachite door-btn"
                    data-door="{{ $doorId }}" data-action="open">
                    Unlock
                </x-buttons.door-button>

                <x-buttons.door-button class="w-full bg-ruddy/85 hover:bg-ruddy focus:bg-ruddy door-btn"
                    data-door="{{ $doorId }}" data-action="close">
                    Lock
                </x-buttons.door-button>
            </div>
        </div>
        @endforeach
    </div>

    @push('scripts')
    @vite(['resources/js/dashboard/access-control.js'])
    @endpush
</x-app-layout>