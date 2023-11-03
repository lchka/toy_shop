<title>Lili's Index for Pet Toy Store</title>
<!-- this is the main index page for my toy entity -->
<x-app-layout>
    <x-slot name="header">
       
        <h2 class="font-bold text-xl text-white-800 leading-tight">
            {{ __('All Toys') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <!-- in our function index we stated a query that includes paginations
            this allows us to use lesser code and eliminate any overwriting of the $toys variable.
             This is done by requesting the user to choose a column and in which direction it would like it displayed
            this is then passed through the route (toys.index) and post the results based on the query stated there  -->

                                <form method="GET" action="{{ route('toys.index') }}">
                        @csrf


                        
                        <input style= "padding-right:200px; margin-right:25px;" type="text" id="keyword" name="keyword" placeholder="Search by Keyword" value="{{ Request::input('keyword') }}">


                       


                        <select class="filter-select" style="margin-right:25px;" id="column" name="column">
                        <option value="name" {{ Request::input('column') == '' ? 'selected' : '' }}>Select Column</option>
                            <option value="name" {{ Request::input('column') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="colour" {{ Request::input('column') == 'colour' ? 'selected' : '' }}>Colour</option>
                            <option value="type" {{ Request::input('column') == 'type' ? 'selected' : '' }}>Type</option>
                            <option value="size" {{ Request::input('column') == 'size' ? 'selected' : '' }}>Size</option>
                        </select>

                        <select class="filter-select" style="margin-right:25px;" id="direction" name="direction">
                        <option value="name" {{ Request::input('column') == '' ? 'selected' : '' }}>Select order by</option>
                            <option value="asc" {{ Request::input('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ Request::input('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select> 

                        <button type="submit" style="background-color: #A5D3F8; color: white; border:2px solid #2196F3; font-weight:bold; font-size: 16px; padding: 5px 20px; cursor: pointer; transition: background-color 0.1s;" 
                            onmouseover="this.style.backgroundColor='#2295F2'; this.style.color='white'; this.style.border='2px solid #2196F3';" 
                            onmouseout="this.style.backgroundColor='#8EC8F7'; this.style.color='white'; this.style.border='2px solid #2196F3';">
                            Search & Sort
                        </button>

                    </form>


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

<!-- add the inbuilt pagination for each of the query -->

             <div class="pagination">
              {{ $toys->links() }}
            </div>

        </div>
       
    </div>
</x-app-layout>