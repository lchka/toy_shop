<title>Lili's Edit for Pet Toy Store</title>


<!-- creates a template for the edit section of the show view (from a specific id)-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Toy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

<!-- enctpye is the encoding tpye, and the multipart means that the upload can be split into smaller files so its faster to process -->
<form action="{{ route('toys.update', $toy) }}" method="post" enctype="multipart/form-data">
    @method('put')
                    @csrf
              
<!-- creates an edit for the name input -->

                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $toy->name)"></x-text-input>
                        @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- using the component text-input it pulls the design and displays it with the correct attributes -->


                        <!-- creates an edit for the type input -->

                        <x-text-input
                        type="text"
                        name="type"
                        field="type"
                        placeholder="Type"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('type', $toy->type)"></x-text-input>
                        @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                   <!-- using the component text-input it pulls the design and displays it with the correct attributes -->

                        <!-- creates an edit for the colour select -->


                    <x-select
                        type="select"
                        name="colour" 
                        id="colour" 
                        field="colour"
                        
                        class="w-full mt-6"
                        :value="@old('colour', $toy->colour)" 
                        ></x-select>

                        @error('colour')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                     <!-- using the component select it pulls the design and displays it with the correct attributes -->

                        <!-- creates an edit for the size select -->


                        <x-select-size
                        type="select"
                        name="size" 
                        id="size" 
                        field="size"
                        class="w-full mt-6"
                        :value="@old('size', $toy->size)" >
                        </x-select-size>

                        @error('size')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <!-- using the component select-size it pulls the design and displays it with the correct attributes -->


                    <!-- creates an edit for the description textarea -->
                    <x-textarea
                        type="text"
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description', $toy->description)" >       
                     </x-textarea>
                     @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    <!-- using the component textarea it pulls the design and displays it with the correct attributes -->


                    <!-- creates an edit for the image file input -->
                  
                    <x-file-input
                        type="file"
                        name="toy_image"
                        placeholder="Toy Image"
                        class="w-full mt-6"
                        field="toy_image"
                        :value="@old('toy_image')">
                    </x-file-input>
                    @error('toy_image')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                     <!-- using the component file-input it pulls the design and displays it with the correct attributes -->

                    <x-primary-button class="mt-6">Update Toy</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>