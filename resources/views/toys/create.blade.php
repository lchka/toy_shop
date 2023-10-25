<!-- still dont think this is pushing into the database need to check my back-up -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Toy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('toys.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>
                        @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror


                        <x-text-input
                        type="text"
                        name="type"
                        field="type"
                        placeholder="Type"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('type')"></x-text-input>
                        @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    <!-- original version of validation -->

                    <!-- <x-text-input
                        type="text"
                        name="colour"
                        field="colour"
                        placeholder="colour..."
                        class="w-full mt-6"
                        :value="@old('colour')">
                    </x-text-input> -->

                    <!-- ugly version of select but validates erros and loops colour enum  should make a similar design if drop down already isnt-->
                    <!-- made a similar design and placed the foreach of the colours there -->
                    <!-- cant pass through the options here, bus tbe declared as an array in my component, not sure why
                    chatgpt doesn't know either -->

                    <x-select
                        name="colour" 
                        id="colour" 
                        field="colour"
                        class="w-full mt-6"
                        :value="@old('colour')" 
                        ></x-select>

                        @error('colour')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    
                        <x-select-size
                        name="size" 
                        id="size" 
                        field="size"
                        class="w-full mt-6"
                        :value="@old('size')" 
                        ></x-select-size>

                        @error('size')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror


                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')">
                    </x-textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                  
                    <x-file-input
                        type="file"
                        name="toy_image"
                        placeholder="Toy"
                        class="w-full mt-6"
                        field="toy_image"
                        :value="@old('toy_image')">>
                    </x-file-input>
                    @error('toy_image')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    <x-primary-button class="mt-6">Create Toy</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>