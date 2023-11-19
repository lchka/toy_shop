
<x-app-layout>
    <!-- this is the main show page for my toy entity -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

         <!-- used for making the succes alert appear, by saying if the session was successful then display this message -->

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-xl sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>

                                <!-- displays the toy name by pulling by toy id from the database -->

                            <tr>
                                <td style="font-weight: bold; font-size:28px; padding-bottom:25px">{{ $toy->name }}</td>
                            </tr>

                                <!-- displays the toy image by pulling by toy id from the database -->


                                <td rowspan="6">
                                    <img src="{{ asset($toy->toy_image) }}" width="250"  />
                                </td>
                            </tr>

                            <!-- displays the toy colour by pulling by toy id from the database -->


                            <tr>
                                <td class="font-bold" style="padding-left: 25px;">Colour:</td>
                                <td style="text-transform: capitalize; font-style: italic;">{{ $toy->colour }}</td>
                            </tr>

                            <!-- displays the toy size by pulling by toy id from the database -->

                            <tr>
                                <td class="font-bold" style="padding-left: 25px;">Size:</td>
                                <td style="text-transform: capitalize; font-style: italic;">{{ $toy->size }}</td>
                            </tr>

                            <!-- displays the toy type by pulling by toy id from the database -->

                            <tr>
                                <td class="font-bold" style="padding-left: 25px;">Type:</td>
                                <td style="text-transform: capitalize; font-style: italic;">{{ $toy->type }}</td>
                            </tr>

                            <!-- displays the company name by pulling by toy id from the database -->

                            <tr>
                                <td class="font-bold" style="padding-left: 25px;">Company:</td>
                                <td style="text-transform: capitalize; font-style: italic;">{{ $toy->company_name }}</td>
                            </tr>

                            <!-- displays the toy description by pulling by toy id from the database -->


                            <tr> 
                                <td class="font-bold" style="padding-left: 25px; padding-right: 10px;">Description:</td>
                                <td style="vertical-align: center; font-style: italic;">{{ $toy->description }}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
