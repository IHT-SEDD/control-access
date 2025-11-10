<x-app-layout>
    <x-slot name="header">
        <h2 class="header-text">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="w-full flex flex-shrink justify-between items-start gap-4">
        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 1</h3>
                </div>
                <div class="p-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-base text-ruddy">Closed</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-32/9 flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>
            <x-buttons.default-button type="submit" class="mt-6">
                {{ __('Lock') }}
            </x-buttons.default-button>
        </div>
        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 2</h3>
                </div>
                <div class="p-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-base text-ruddy">Closed</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-32/9 flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>
            <x-buttons.default-button type="submit" class="mt-6">
                {{ __('Lock') }}
            </x-buttons.default-button>
        </div>
    </div>
</x-app-layout>