<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Animals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <!-- alert-success is a component I created to display a success message that may be sent from the controller.
            For example, when a animal is deleted, a message like "animal Deleted Successfully" will be displayed -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        
            <x-primary-button>
                <a href="{{ route('admin.animals.create') }}">Add a Animal</a>
            </x-primary-button>

            @forelse ($animals as $animal)
                <x-card>
                  
                        <a href="{{ route('admin.animals.show', $animal) }}" class="font-bold text-2xl">{{ $animal->animal_name }}</a>
            
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $animal->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Animal Name:</span> {{ $animal->animal_name }}
                        </p>

                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Animal Name:</span> {{ $animal->breed }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">size:</span> {{ $animal->size }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Country Of Origin:</span> {{ $animal->country }}
                        </p>
            
                </x-card>   
            @empty
                <p>No Animals</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>