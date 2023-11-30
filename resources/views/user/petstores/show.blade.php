<!-- resources/views/admin/publishers/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $petstore->store_name }} - Toys for this petstore
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <!-- Display publisher details -->

            <h3 class="font-bold text-2xl mb-4"$petstore Details</h3>
            <p class="text-gray-700"><span class="font-bold">ID:</span> {{ $petstore->id }}</p>
            <p class="text-gray-700"><span class="font-bold">Name:</span> {{ $petstore->store_name }}</p>
            <p class="text-gray-700"><span class="font-bold">Phone:</span> {{ $petstore->phone }}</p>
            <p class="text-gray-700"><span class="font-bold">Email:</span> {{ $petstore->email }}</p>


            <!-- Display books for the publisher -->

            <h3 class="font-bold text-2xl mt-6 mb-4">Toys by {{ $petstore->store_name }}</h3>

            @forelse ($toys as $toy)
                <x-card>
                     <a href="{{ route('user.toys.show', $toy) }}" class="font-bold text-2xl">{{ $toy->name }}</a>
                    
                </x-card>
            @empty
                <p>No toys for this petstore</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>