<title>Lili's Index for Pet Toy Store</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Toys') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            
            @forelse ($toys as $toy)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bolder text-2xl">

                    <!-- my link to the show -->

                    <a href="{{ route('toys.show', $toy) }}">{{ ucfirst($toy->name) }}</a>
                    </h2>

                    <!-- should be displaying all these in the index-->

                    <p class="mt-2">
                        <p>Toy Colour: {{ucfirst ($toy->colour) }}</p>
                        <p>Toy Description: {{ucfirst($toy->description)}}</p>
                       <p> @if ($toy->toy_image)

                    <!-- made the image clickable so that they also show the the specifc column by id -->

                        <a href="{{ route('toys.show', $toy) }}"><img src="{{ asset($toy->toy_image) }}" alt="{{ $toy->title }}" width="100">
                        </a>
                    @else
                        No Image
                    @endif
                    </p></p>

                </div>
            @empty
            <p>No Toys</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>