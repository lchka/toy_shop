<title>Lili's Index for Pet Toy Store</title>
<!-- this is the main index page for my toy entity -->
<x-app-layout>
    <x-slot name="header">
       
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('All Toys') }}
        </h2>
    </x-slot>
    
                

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET">
                    @csrf
                    <label for="column">Select a Column to Sort By:</label>
                    <select id="column" name="column" onchange="this.form.submit()">
                    <option value="name" {{ Request::input('column') == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="colour" {{ Request::input('column') == 'colour' ? 'selected' : '' }}>Colour</option>
                        <option value="type" {{ Request::input('column') == 'type' ? 'selected' : '' }}>Type</option>
                        <option value="size" {{ Request::input('column') == 'size' ? 'selected' : '' }}>Size</option>
                    </select>
                </form>

                <div>
                    <table>
                        <tbody>
                            @php
                                $column = Request::input('column', 'id');
                                $direction = Request::input('direction', 'desc');
                                $toyz = $toys->sortBy($column, SORT_REGULAR, $direction);
                            @endphp
                        </tbody>
                    </table>
                </div>
            <!-- used for making the succes alert appear, by saying if the session was successful then display this message -->
        <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
    
<!-- resources/views/toys.index.blade.php -->

            @forelse ($toys as $toy)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bolder text-2xl">

                    <!-- my link to the show -->

                    <a href="{{ route('toys.show', $toy) }}">{{ ucfirst($toy->name) }}</a>
                    </h2>

                    <!-- should be displaying all these in the index-->

                    <p class="mt-2">
                        <p>Toy Colour: {{ucfirst ($toy->colour) }}</p>
                        <p>Toy Size: {{ucfirst ($toy->size) }}</p>
                        <p>Toy Description: {{ucfirst($toy->description)}}</p>
                       <p> @if ($toy->toy_image)

                    <!-- made the image clickable so that they also show the the specifc column by id -->

                        <a href="{{ route('toys.show', $toy) }}"><img src="{{ asset($toy->toy_image) }}" alt="{{ $toy->name }}" width="100">
                        </a>
                        
                    @else
                        No Image
                    @endif
                    </p></p>

                </div>
            @empty
            <p>No Toys</p>
            @endforelse

             <div class="pagination">
              {{ $toys->links() }}
            </div>

        </div>
       
    </div>
</x-app-layout>