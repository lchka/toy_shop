<title>Lili's Create for Animal Entity</title>

<!-- creates a template for the create section of the dashboard, once this is validated in factory it is pushed into the view and displays it in the index.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- allows for the input to have enctype is the encoding type, and the multipart means that the upload can be split into smaller files so it's faster to process -->
                <form action="{{ route('admin.animals.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="flex items-center">
                        <div class="flex-1 mr-4">
                            <!-- creates a create for the animal name input -->
                            <x-text-input type="text" name="animal_name" field="animal_name" placeholder="Animal Name"
                                class="w-full" autocomplete="off" :value="@old('animal_name')">
                            </x-text-input>
                            <!-- Using the component text-input, it pulls the design and displays it with the correct attributes -->

                            <!-- Display validation error messages -->
                            @error('animal_name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <!-- Display error for other fields similarly -->

                            <!-- creates a create for the size select -->
                            <x-select-size type="select" name="size" id="size" field="size" class="w-full mt-6"
                                :value="@old('size')">
                            </x-select-size>

                            @error('size')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <!-- using the component select-size it pulls the design and displays it with the correct attributes -->

                            <!-- creates a create for the company name text input -->
                            <x-text-input type="text" name="country" field="country" placeholder="Country of Origin"
                                class="w-full mt-6" autocomplete="off" :value="@old('country')">
                            </x-text-input>

                            @error('country')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image on the right side -->
                        <div class="text-center">
                            <!-- The image is placed on the right side -->
                            <img src="{{ asset('images/love.jpg') }}" alt="Image Description" width="100%"
                                style="max-width: 215px;">
                        </div>
                    </div>


                    <x-primary-button>Create Animal</x-primary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>