
<x-app-layout>
    <!-- this is the main show page for my toy entity -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

         <!-- used for making the succes alert appear, by saying if the session was successful then display this message -->

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="6">
                                    <img src="{{ asset($toy->toy_image) }}" width="150" />
                                </td>
                            </tr>
                            <tr>
<!-- displays the toy name by pulling by toy id from the database -->

                                <td class="font-bold">Name</td>
                                <td>{{ $toy->name }}</td>
                            </tr>

<!-- displays the toy description by pulling by toy id from the database -->


                            <tr>
                                <td class="font-bold">Description</td>
                                <td>{{ $toy->description }}</td>
                            </tr>

<!-- displays the toy colour by pulling by toy id from the database -->


                            <tr>
                                <td class="font-bold">Colour</td>
                                <td>{{ $toy->colour }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Button to go to the edit page of the specific column -->
                    <x-primary-button><a href="{{ route('toys.edit', $toy) }}">Edit</a></x-primary-button>

                    <!-- Delete button linking to the delete route must use the method delete and not get as its removing something from the database rather than retrieving it -->
                    <form method="POST" action="{{ route('toys.destroy', $toy) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button>Delete</x-primary-button>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
