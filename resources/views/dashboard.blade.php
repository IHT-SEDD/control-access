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
            <x-buttons.door-button class="w-fit bg-ruddy/85 hover:bg-ruddy focus:bg-ruddy lock-all-btn"
                data-action="close">
                Lock All
            </x-buttons.door-button>
        </div>
    </div>

    {{-- <div class="w-full flex flex-col lg:flex-row flex-shrink justify-between items-start gap-4">
        @foreach ($doors as $door)
        @php
        $camera = optional($door->tower->nvrs->first()?->cameras->first());
        $streamUrl = $camera ? "http://127.0.0.1:8889/{$camera->code}/whep" : null;
        @endphp

        <div class="card w-full" id="door-card-{{ $door->id }}">
            <div class="card-title flex-col xs:flex-row gap-2 xs:gap-0">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner w-full xs:w-fit">
                    <h3 class="font-mono text-xs sm:text-sm text-blaze-orange">Door {{ $door->name }} - Tower {{
                        $door->tower->name ?? 'N/A' }} </h3>
                </div>
                <div class="p-1 rounded-lg bg-ruddy/30 shadow-md w-full xs:w-fit">
                    <h3 class="text-xs sm:text-sm text-ruddy door-status" data-door="{{ $door->id }}">Closed</h3>
                </div>
            </div>

            <div
                class="rounded-lg border border-default bg-linen shadow-inner aspect-video flex items-center justify-center mb-4">
                @if ($streamUrl)
                <video id="preview_cam_{{ $door->id }}" autoplay playsinline muted
                    class="rounded-lg block w-full h-full" data-stream="{{ $streamUrl }}">
                </video>
                @else
                <p class="text-gray-500 text-sm">No camera available for this door</p>
                @endif
            </div>

            <div
                class="flex flex-col lg:flex-row items-center justify-center gap-1 p-1 rounded-lg border border-default bg-linen shadow-inner">
                <x-buttons.door-button
                    class="w-full bg-vivid-malachite/85 hover:bg-vivid-malachite focus:bg-vivid-malachite door-btn"
                    data-door="{{ $door->id }}" data-action="open">
                    Unlock
                </x-buttons.door-button>

                <x-buttons.door-button class="w-full bg-ruddy/85 hover:bg-ruddy focus:bg-ruddy door-btn"
                    data-door="{{ $door->id }}" data-action="close">
                    Lock
                </x-buttons.door-button>
            </div>
        </div>
        @endforeach
    </div> --}}

    @push('scripts')
    @vite(['resources/js/dashboard/access-control.js'])
    @endpush
</x-app-layout>