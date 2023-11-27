<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $animal->animal_name}} - Toys
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="font-bold text-2xl mb-4">Animal Details</h3>
            <p class="text-gray-700"><span class="font-bold">Id:</span> {{ $animal->id }} </p>
            <p class="text-gray-700"><span class="font-bold">name:</span> {{ $animal->animal_name }} </p>
            <p class="text-gray-700"><span class="font-bold">name:</span> {{ $animal->breed }} </p>
            <p class="text-gray-700"><span class="font-bold">Size:</span> {{ $animal->size }} </p>
            <!-- might break as size is an enum -->
            <p class="text-gray-700"><span class="font-bold">Country of Origin:</span> {{ $animal->country }} </p>

            <h3 class="font-bold text-2xl mt-6 mb-4">Toys By {{ $animal->animal_name }}</h3>

            @forelse ($toys as $toy)
            <x-card>
                <a href="{{ route('user.toys.index', $toy) }}" class="font-bold text-2xl"> {{ $toy->name }} </a>
            </x-card>

            @empty
            <p> No Toys for this animal </p>
            @endforelse
        </div>
    </div>

</x-app-layout>