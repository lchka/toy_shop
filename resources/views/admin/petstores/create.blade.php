<title>Lili's Create for Petstore Entity</title>

<!-- creates a template for the create section of the dashboard, once this is validated in factory it is pushed into the view and displays it in the index.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Petstore') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- allows for the input to have enctype is the encoding type, and the multipart means that the upload can be split into smaller files so it's faster to process -->
                <form action="{{ route('admin.petstores.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="flex items-center">
                        <div class="flex-1 mr-4">

                            <x-text-input type="text" name="store_name" field="store_name"
                                placeholder="Store Name" class="w-full" autocomplete="off" :value="@old('store_name')">
                            </x-text-input>
                            @error('store_name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <x-text-input type="text" name="email" field="email" placeholder="Email" class="w-full mt-6"
                                autocomplete="off" :value="@old('email')">
                            </x-text-input>
                            @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <x-text-input type="text" name="phone" field="phone" placeholder="Phone Number" class="w-full mt-6"
                                autocomplete="off" :value="@old('phone')">
                            </x-text-input>
                            @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror

                            <x-textarea style="margin-top:20px" type="text" name="location" field="location" placeholder="Petstore Location"
                                class="w-full" autocomplete="off" :value="@old('location')">
                            </x-textarea>
                            @error('location')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror

                        </div>

                        <!-- Image on the right side -->
                        <div class="text-center">
                            <!-- The image is placed on the right side -->
                            <img src="{{ asset('images/petshop.png') }}" alt="Image Description" width="100%"
                                style="max-width: 215px;">
                        </div>
                    </div>


                    <x-primary-button style="margin-top:15px">Create Petstore</x-primary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>