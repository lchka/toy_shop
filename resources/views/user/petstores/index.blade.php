<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Petstores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            @php
            $itemNumber = ($petstores->currentPage() - 1) * $petstores->perPage() + 1;
            @endphp
            @forelse ($petstores  as $index => $petstore)
                    <x-card>
                    <span class="font-bold text-2xl">{{ $itemNumber }}.</span><a href="{{ route('user.petstores.show', $petstore) }}" class="font-bold text-2xl">{{ $petstore->store_name }}</a>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $petstore->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Petstore Name:</span> {{ $petstore->store_name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Petstore Location:</span> {{ $petstore->location }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Petstore email:</span> {{ $petstore->email }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Petstore Phone:</span> {{ $petstore->phone }}
                        </p>
                    </x-card>
                    @php
            $itemNumber++;
            @endphp
            @empty
                <p>No Petstores</p>
            @endforelse

        </div>
        {{ $petstores->appends(request()->except('page'))->links() }}

    </div>
</x-app-layout>
