<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <td class="font-bold">Name</td>
                                <td>{{ $toy->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Description</td>
                                <td>{{ $toy->description }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Colour</td>
                                <td>{{ $toy->colour }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Button to go to the edit page of the specific column -->
                    <x-primary-button><a href="{{ route('toys.edit', $toy) }}">Edit</a></x-primary-button>

                    <!-- Delete button linking to the delete route -->
                    <form method="POST" action="{{ route('toys.destroy', $toy) }}">
                        @csrf
                        @method('DELETE')
                        <x-primary-button type="submit">Delete</x-primary-button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
