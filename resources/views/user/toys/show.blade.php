<x-app-layout>
    <!-- this is the main show page for my toy entity -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- used for making the success alert appear, by saying if the session was successful then display this message -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="flex flex-wrap">

                    <!-- Right section for the image -->
                    <div class="w-full md:w-1/3 p-6">
                        <h3 class="font-bold mb-4" style="font-size:28px;">{{ $toy->name }}</h3>
                        <img src="{{ asset($toy->toy_image) }}" class="mx-auto" width="250" style="margin-left: -10px;" />
                    </div>

                    <!-- Left section for text content -->
                    <div class="w-full md:w-2/3 p-6 border-b border-gray-200">
                        <table class="table table-hover">
                            <tbody>
                                <!-- displays the toy attributes -->
                                <tr>
                                    <td class="font-bold">Colour:</td>
                                    <td style="text-transform: capitalize; font-style: italic;">{{ $toy->colour }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold">Size:</td>
                                    <td style="text-transform: capitalize; font-style: italic;">{{ $toy->size }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold">Type:</td>
                                    <td style="text-transform: capitalize; font-style: italic;">{{ $toy->type }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold">Company:</td>
                                    <td style="text-transform: capitalize; font-style: italic;">{{ $toy->company_name }}</td>
                                </tr>

                                <!-- displays the toy description -->
                                <tr>
                                    <td class="font-bold">Description:</td>
                                    <td style="vertical-align: top; font-style: italic;">{{ $toy->description }}</td>
                                </tr>

                                <!-- displays the associated animal details -->
                                <tr>
                                    <td class="font-bold">Animal Name:</td>
                                    <td style="vertical-align: center; font-style: italic;">{{ $toy->animal->animal_name }}</td>
                                </tr>

                                <tr>
                                    <td class="font-bold">Animal Breed:</td>
                                    <td style="vertical-align: center; font-style: italic;">{{ $toy->animal->breed }}</td>
                                </tr>

                                <!-- displays the associated petstores -->
                                @foreach ($toy->petstores as $petstore)
                                <tr>
                                    <td class="font-bold">Located at:</td>
                                    <td style="vertical-align: center; font-style: italic;">{{ $petstore->store_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
