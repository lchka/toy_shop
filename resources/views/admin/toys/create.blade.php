<title>Lili's Create for Pet Toy Store</title>


<!-- creates a template for the create section of the dashboard, once this is validated in factory it is pushed into the view and displays it in the index.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Toy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <!-- allows for the input to have enctpye is the encoding tpye, and the multipart means that the upload can be split into smaller files so its faster to process -->

                <form action="{{ route('admin.toys.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- creates a create for the name input -->

                    <x-text-input type="text" name="name" field="name" placeholder="Name" class="w-full"
                        autocomplete="off" :value="@old('name')"></x-text-input>
                    @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror


                    <!-- creates a create for the type input -->

                    <x-text-input type="text" name="type" field="type" placeholder="Type" class="w-full mt-6"
                        autocomplete="off" :value="@old('type')"></x-text-input>
                    @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror


                    <x-select type="select" name="colour" id="colour" field="colour" class="w-full mt-6"
                        :value="@old('colour')"></x-select>
                    @error('colour')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <!-- using the component select it pulls the design and displays it with the correct attributes -->

                    <!-- creates a create for the size select -->

                    <x-select-size type="select" name="size" id="size" field="size" class="w-full mt-6"
                        :value="@old('size')"></x-select-size>
                    @error('size')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <!-- using the component select-size it pulls the design and displays it with the correct attributes -->

                    <!-- creates a create for the company name text input -->

                    <x-text-input type="text" name="company_name" field="company_name" placeholder="Company Name"
                        class="w-full mt-6" autocomplete="off" :value="@old('company_name')">
                    </x-text-input>
                    @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <!-- creates a create for the animal name textarea -->

                    <div class="mt-6">
                        <x-select-animal name="animal_id" :animals="$animals" :selected="old('animal_id')" />
                    </div>
                    @error('animal_id')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="mt-6">
                        <label for="petstores"> <strong>Petstores</strong><br></label>
                        @foreach ($petstores as $petstore)
                        <input type="checkbox" , value="{{$petstore->id}}" name="petstores[]">
                        {{$petstore->store_name}}</input>
                        @endforeach
                    </div>


                    <!-- creates a create for the description textarea -->
                    <x-textarea type="text" name="description" rows="10" field="description"
                        placeholder="Description..." class="w-full mt-6" :value="@old('description')"></x-textarea>
                    @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="mt-6">
                        <label for="petstores"><strong>Petstores</strong><br></label>
                        @foreach ($petstores as $petstore)
                        <div>
                            <input type="checkbox" value="{{ $petstore->id }}" name="petstores[]">
                            <label>{{ $petstore->store_name }}</label>
                        </div>
                        @endforeach
                    </div>


                    <!-- creates a create for the image file input -->

                    <x-file-input type="file" name="toy_image" placeholder="Toy Image" class="w-full mt-6"
                        field="toy_image" :value="@old('toy_image')">>
                    </x-file-input>
                    @error('toy_image')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <!-- using the component file-input it pulls the design and displays it with the correct attributes -->

                    <x-primary-button class="mt-6">Create Toy</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>