<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Used for making the success alert appear, by saying if the session was successful then display this message -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class=" shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 border-b border-gray-200 shadow-xl sm:rounded-lg">

                    <!-- Styling for Animal Details -->
                    <div class="bg-white border-b border-gray-200 shadow-xl sm:rounded-lg p-6 mb-6">
                        <h3 class="font-bold text-2xl mb-4">Animal Details</h3>
                        <p class="text-gray-700"><span class="font-bold">Id:</span> {{ $animal->id }} </p>
                        <p class="text-gray-700"><span class="font-bold">Name:</span> {{ $animal->animal_name }} </p>
                        <p class="text-gray-700"><span class="font-bold">Size:</span> {{ $animal->size }} </p>
                        <!-- Adjust this part based on the actual output for country -->
                        <p class="text-gray-700"><span class="font-bold">Country of Origin:</span> {{ $animal->country }} </p>
                         <x-primary-button><a href="{{ route('admin.animals.edit', $animal) }}">Edit</a></x-primary-button>

            <form method="POST" action="{{ route('admin.animals.destroy', $animal) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                    </form>
                    </div>



            
           

                    
            <h3 class="font-bold text-2xl mt-6 mb-4">Toys By {{ $animal->animal_name }}</h3>

            @forelse ($toys as $toy)
            <x-card>
                <a href="{{ route('admin.toys.index', $toy) }}" class="font-bold text-2xl"> {{ $toy->name }} </a>
            </x-card>

            @empty
            <p> No Toys for this animal </p>
            @endforelse

            
        </div>
    </div>

</x-app-layout>