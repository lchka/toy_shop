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
        
<!-- add a petstore button -->

            <!-- <x-primary-button>
                <a href="{{ route('admin.petstores.create') }}">Add a petstore</a>
            </x-primary-button> -->

            @forelse ($petstores as $petstore)
                <x-card>
                  
                        <a href="{{ route('admin.petstores.show', $petstore) }}" class="font-bold text-2xl">{{ $petstore->store_name }}</a>
            
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
            @empty
                <p>No Petstores</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>