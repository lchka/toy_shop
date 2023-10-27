<!-- html layout for show page -->
<title>Lili's Show for Pet Toy Store</title>


<x-app-layout>

<!-- this is used to create the header Dashboard which is displayed on the page -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                            <td rowspan="6">
                        
                            <!-- pushes the images from the storage folder and displayes it when the unique/specific id is chosen. -->

                                <!-- 'storage/images/' . replace this before $toy to have imaegs taken from folder  -->
                                <img src="{{asset( $toy->toy_image) }}" width="150" />
                            </td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Name</td>
                                <td>{{ $toy->name }}</td>
                            </tr>
                           
                            <tr>
                                <td class="font-bold">Description </td>
                                <td>{{ $toy->description }}</td>
                            </tr>

                           <p> <tr>
                                <td class="font-bold ">Colour</td>
                                <td>{{ $toy->colour }}</td>
                            </tr></p>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>