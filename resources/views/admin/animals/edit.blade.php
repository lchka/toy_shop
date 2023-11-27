<title>Lili's Edit for Animal Entity</title>


<!-- creates a template for the create animal section of the dashboard, once this is validated in factory it is pushed into the view and displays it in the index.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

<!-- allows for the input to have enctpye is the encoding tpye, and the multipart means that the upload can be split into smaller files so its faster to process -->

                <form action="{{ route('admin.animals.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

<!-- creates a create for the name input -->

                    <x-text-input 
                        style="margin-bottom:15px"
                        type="text"
                        name="animal_name"
                        field="animal_name"
                        placeholder="Animal Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('animal_name', $animal->animal_name)"></x-text-input>
                        @error('animal_name')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <x-text-input
                        type="text"
                        name="breed"
                        field="breed"
                        placeholder="Animal Breed"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('breed', $animal->breed)"></x-text-input>
                        @error('breed')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <select
                        class="custom-select w-full mt-6"
                        type="select"
                        name="size" 
                        id="size" 
                        field="size">
                        @foreach(['small', 'medium', 'large'] as $size)
                            <option value="{{ $size }}" {{ old('size') === $size ? 'selected' : '' }}>{{ ucfirst($size) }}</option>
                        @endforeach
                    </select>

                    @error('colour')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                        <!-- using the component select-size it pulls the design and displays it with the correct attributes -->

                        <!-- creates a create for the company name text input -->

                        <x-text-input
                        type="text"
                        name="country"
                        field="country"
                        placeholder="Country of Origin"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('country', $animal->country)">
                        </x-text-input>

                        @error('country')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    <x-primary-button class="mt-6">Update Animal</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>