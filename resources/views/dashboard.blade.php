<x-app-layout>
    <x-slot name="header">
        <h2 class="header-text">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-shrink justify-between items-start gap-4">
        @foreach (['1', '2', '3', '4', '5', '6'] as $doorId)
        <div x-data="{ status: 'Closed', loading: false }" class="card w-full">
            <div class="card-title">
                <div class="py-1 px-2 rounded-lg bg-linen shadow-inner">
                    <h3 class="font-mono text-base text-blaze-orange">Door {{ $doorId }}</h3>
                </div>
                <div class="p-1 rounded-lg bg-ruddy/30 shadow-md">
                    <h3 class="text-base text-ruddy" x-text="status"></h3>
                </div>
            </div>

            <div class="rounded-md border border-default bg-linen shadow-inner aspect-video flex items-center justify-center">
                <p class="paragraph-text">Cam Preview</p>
            </div>

            <x-buttons.default-button
                class="mt-6"
                x-bind:class="loading ? 'opacity-50 pointer-events-none' : ''"
                x-on:click="
                    loading = true;
                    fetch('{{ route('door.toggle', ['doorId' => $doorId]) }}', {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            status = data.new_state;
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(() => alert('Connection error'))
                    .finally(() => loading = false);
                ">
                <span x-show="!loading">Toggle Lock</span>
                <span x-show="loading">Processing...</span>
            </x-buttons.default-button>
        </div>
        @endforeach
    </div>
</x-app-layout>
