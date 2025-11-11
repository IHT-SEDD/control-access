<x-app-layout>
    <x-slot name="header">
        <h2 class="header-text">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="w-full flex flex-col lg:flex-row flex-shrink justify-between items-start gap-4">
        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 1</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>

        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 2</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>

        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 3</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>

        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 4</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>

        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 5</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>

        <div class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door 6</h3>
                </div>
                <div class="px-2 py-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-sm text-ruddy">Lock</h3>
                </div>
            </div>

            <div
                class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <div
                class="flex items-center justify-center p-2 gap-1 mt-6 rounded-lg border border-default shadow-inner bg-linen">
                <x-buttons.default-button type="submit" class="bg-ruddy/80 focus:bg-ruddy hover:bg-ruddy">
                    {{ __('Lock') }}
                </x-buttons.default-button>
                <x-buttons.default-button type="submit"
                    class="bg-vivid-malachite/80 focus:bg-vivid-malachite hover:bg-vivid-malachite">
                    {{ __('Unlock') }}
                </x-buttons.default-button>
            </div>
        </div>
    </div>
</x-app-layout>