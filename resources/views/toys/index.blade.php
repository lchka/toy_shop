<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Toys') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <a href="{{ route('toys.create') }}" class="btn-link btn-lg mb-2">Add a Toy</a>
            @forelse ($toys as $toy)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('toys.show', $toy) }}">{{ $toy->name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $toy->colour }}
                        {{$toy->description}}
                        @if ($toy->toy_image)
                        <img src="{{ $toy->toy_image }}" 
                        alt="{{ $toy->name }}" width="100">
                    @else
                        No Image
                    @endif
                    </p>

                </div>
            @empty
            <p>No books</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>