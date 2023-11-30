<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $petstore->store_name }} - Toys for this petstore
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Display petstore details -->
            <div class="bg-white shadow-xl sm:rounded-lg p-6 mb-6">
                <h3 class="font-bold text-2xl mb-4">Petstore Details</h3>
                <p class="text-gray-700"><span class="font-bold">ID:</span> {{ $petstore->id }}</p>
                <p class="text-gray-700"><span class="font-bold">Name:</span> {{ $petstore->store_name }}</p>
                <p class="text-gray-700"><span class="font-bold">Phone:</span> {{ $petstore->phone }}</p>
                <p class="text-gray-700"><span class="font-bold">Email:</span> {{ $petstore->email }}</p>

                <x-primary-button><a href="{{ route('admin.petstores.edit', $petstore) }}">Edit</a></x-primary-button>
                <form method="POST" action="{{ route('admin.petstores.destroy', $petstore) }}">
                    @csrf
                    @method('DELETE')
                    <x-primary-button
                        onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                </form>
            </div>

            <!-- Display toys for the petstore -->
            <div class="shadow-xl sm:rounded-lg p-6">
                <h3 class="font-bold text-2xl mb-4">Toys by {{ $petstore->store_name }}</h3>

                @forelse ($toys as $toy)
                <x-card>
                    <div class="font-bold text-2xl">
                        <a href="{{ route('admin.toys.show', $toy) }}">{{ $toy->name }}</a>
                    </div>
                    <!-- Include other toy details if needed -->
                </x-card>
                @empty
                <p>No toys for this petstore</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>