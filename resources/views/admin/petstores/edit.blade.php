<title>Lili's Edit for Petstore Entity</title>


<!-- creates a template for the create petstore section of the dashboard, once this is validated in factory it is pushed into the view and displays it in the index.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Petstore') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

<!-- allows for the input to have enctpye is the encoding tpye, and the multipart means that the upload can be split into smaller files so its faster to process -->

                <form action="{{ route('admin.petstores.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

<!-- creates a create for the name input -->

                    <x-text-input 
                        style="margin-bottom:15px"
                        type="text"
                        name="store_name"
                        field="store_name"
                        placeholder="Petstore Name:"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('store_name', $petstore->store_name)"></x-text-input>
                        @error('store_name')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <x-text-input
                        type="text"
                        name="email"
                        field="email"
                        placeholder="Email:"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('email', $petstore->email)"></x-text-input>
                        @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <x-text-input
                        type="text"
                        name="phone"
                        field="phone"
                        placeholder="Phone Number"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('phone', $petstore->phone)">
                        </x-text-input>
                        @error('phone')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <x-textarea
                        type="text"
                        name="location"
                        field="location"
                        placeholder="Location:"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('location', $petstore->location)">
                        </x-textarea>
                        @error('location')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    <x-primary-button class="mt-6">Update Petstore</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>