 <!--ERROR WAS SOLVED: colour and size @old isnt working, something to do with how laravel handles components that are selects. When x-select is changed to systems select and the foreach is passed in where the :value is.(PASTED BELOW) the old works, description isnt being remebered either -->
                    <!-- <option value="" selected>Select Colour</option> 
                        @foreach(['red', 'green', 'mixed','black','white','orange','purple','blue','yellow','pink','brown'] as $colour)
                            <option value="{{ $colour }}" {{ old('colour') === $colour ? 'selected' : '' }}>{{ ucfirst($colour) }}</option>
                        @endforeach -->

                    <!-- SOLVED: i ended up using the inbuilt select then css'd in the css file, also the foreach breaks if there is a normal option above it, so the old stopped working. as it was returning an empty array just reading the first option-->





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
                        <form action="{{ route('admin.toys.update', $toy) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                                            @csrf
              
                        <!-- creates an edit for the name input -->
    <!-- using the component text-input it pulls the design and displays it with the correct attributes -->
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

                       


                        <!-- creates an edit for the type input -->
  <!-- using the component text-input it pulls the design and displays it with the correct attributes -->
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

                         <!-- creates an edit for the colour select -->

                    <!-- creates an edit for the colour select -->
    <!-- using the inbuilt select, that has been css'd we loop an array of options as select options and display as a dropdown in the edit for the option colour -->
                        <select
                        class="custom-select w-full mt-6"
                        type="select"
                        name="colour" 
                        id="colour" 
                        field="colour">
                        @foreach(['red', 'green', 'mixed','black','white','orange','purple','blue','yellow','pink','brown'] as $colour)
                            <option value="{{ $colour }}" {{ old('colour') === $colour ? 'selected' : '' }}>{{ ucfirst($colour) }}</option>
                        @endforeach
                    </select>

                    @error('colour')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                     

                        <!-- creates an edit for the size select -->
    <!-- using the inbuilt select, that has been css'd we loop an array of options as select options and display as a dropdown in the edit for the option size-->

                        <select
                        class="custom-select"
                        type="select"
                        name="size" 
                        id="size" 
                        field="size"
                        class="w-full mt-6">
                       
                        @foreach(['small', 'medium', 'large'] as $size)
                            <option value="{{ $size }}" {{ old('size') === $size ? 'selected' : '' }}>{{ ucfirst($size) }}</option>
                        @endforeach
                        </select>
                        @error('size')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        
                    <!-- creates an edit for the company name text input -->

                        <x-text-input
                        type="text"
                        name="company_name"
                        field="company_name"
                        placeholder="Company Name"
                        class="w-full mt-6"
                        autocomplete="off"
                        :value="@old('company_name', $toy->company_name)"></x-text-input>
                        @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                        @enderror



                    <!-- creates an edit for the description textarea -->
                    <!-- using the component textarea it pulls the design and displays it with the correct attributes -->
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


                        <!-- the image is pulled from the folder just no displayed as a file, this line of code proves that by testing the image depending on the toy id -->

                    @if(old('toy_image'))
                        <img src="{{ old('toy_image') }}" width="250" />
                    @else
                        <img src="{{ asset($toy->toy_image) }}" width="250" />
                    @endif


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