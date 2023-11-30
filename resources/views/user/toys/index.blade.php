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


            <form method="GET" action="{{ route('user.toys.index') }}">
                @csrf

                <!-- this creates the input box with a component, a user can places a word or sentence and it allows the user to filter among the results if theyre using the column and direction as well. Its done by querying from the toy controller and placing that 'word' into the query using the sql Like and wild cards. -->

                <x-filter-input>Sort by Keyword"</x-filter-input>

                <!-- laravel breeze doesnt handle selects as components well, hence we're using the inbuilt select, created the select option from the columns where the user can choose which column to select by that is then queried with the toycontroller, defaults to select option-->

                <select class="filter-select" style="margin-right:25px;" id="column" name="column">

                    <option value="" {{ Request::input('column')=='' ? 'selected' : '' }}>Select Column</option>
                    <option value="company_name" {{ Request::input('column')=='company_name' ? 'selected' : '' }}>
                        Company Name</option>
                    <option value="name" {{ Request::input('column')=='name' ? 'selected' : '' }}>Title</option>
                    <option value="colour" {{ Request::input('column')=='colour' ? 'selected' : '' }}>Colour</option>
                    <option value="type" {{ Request::input('column')=='type' ? 'selected' : '' }}>Type</option>
                    <option value="animal_name" {{ Request::input('column')=='animal_name' ? 'selected' : '' }}>Animal
                        Name</option>
                    <option value="breed" {{ Request::input('column')=='breed' ? 'selected' : '' }}>Animal
                        Breed</option>
                    <option value="size" {{ Request::input('column')=='size' ? 'selected' : '' }}>Size</option>
                </select>

                <!-- select options for thr direction in which the column order by, defaults to select order by -->

                <select class="filter-select" style="margin-right:25px;" id="direction" name="direction">
                    <option value="name" {{ Request::input('column')=='' ? 'selected' : '' }}>Order by</option>
                    <option value="asc" {{ Request::input('direction')=='asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ Request::input('direction')=='desc' ? 'selected' : '' }}>Descending</option>
                </select>

                <!-- button that sorts the columns, directions and input box also uses a component -->


                <x-filter-button>
                    Search & Sort
                </x-filter-button>
            </form>



            <!-- used for making the succes alert appear, by saying if the session was successful then display this message -->
           
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <!-- shows the index of all toys  -->


            <!-- this counter works by calculating what page youre on, and what page you were on previously. It take the number of the page and subtracts 1, then it multiples by the number of items displayed on the page (5 since out paginate does that in the toycontroller) and adds 1 (since counters start at 0) adds that to the previous page's item number (hence the 1) -->

            @php
            $itemNumber = ($toys->currentPage() - 1) * $toys->perPage() + 1;
            @endphp

            @forelse ($toys as $index => $toy)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bolder text-2xl">

                    <!-- by using the a php counter we add an item number to each individual item this is done the with $itemNumber variable. -->

                    {{ $itemNumber }}. <a href="{{ route('user.toys.show', $toy) }}">{{ ucfirst($toy->name) }}</a>
                </h2>

                <!-- displays the shown columns -->

                <p class="mt-2">
                <h3 class="font-bold text-1x1"> <strong> For the Animal: </strong>
                    {{$toy->animal->breed}} </h3>
                <p>Toy Colour: {{ucfirst ($toy->colour) }}</p>
                <p>Toy Size: {{ucfirst ($toy->size) }}</p>
                <p>Company: {{ucfirst($toy->company_name)}}</p>
                <p>Toy Description: {{ucfirst($toy->description)}}</p>
                <p>

                    <!-- made the image clickable as well, route then to the show of the item-->

                    @if ($toy->toy_image)
                    <a href="{{ route('user.toys.show', $toy) }}"><img src="{{ asset($toy->toy_image) }}"
                            alt="{{ $toy->name }}" width="100"></a>
                    @else
                    No Image
                    @endif
                </p>
                </p>
            </div>

            <!-- this allows the itemNumber to always increase by 1 and only 1 -->

            @php
            $itemNumber++;
            @endphp
            @empty
            <p>No Toys</p>
            @endforelse

            <!-- added the inbuilt pagination for each of the query -->

            <div class="pagination">
                {{ $toys->appends(request()->except('page'))->links() }}
            </div>

        </div>

    </div>
</x-app-layout>