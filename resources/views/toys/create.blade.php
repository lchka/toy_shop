
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
                        name="colour"
                        field="colour"
                        placeholder="colour..."
                        class="w-full mt-6"
                        :value="@old('colour')">
                    </x-text-input>

                    <!-- ugly version of select but validates erros and loops colour enum  should make a similar design if drop down already isnt-->

                    <!-- <select
                                name="colour" id="colour" class="form-control {{ $errors->has('colour') ? 'is-invalid' : '' }}">
                        <option value="" selected >Select Colour</option>
                        @foreach(['red', 'green', 'mixed', 'black', 'white', 'orange', 'purple', 'blue', 'yellow', 'pink', 'brown'] as $colour)
                            <option value="{{ $colour }}" {{ old('colour') === $colour ? 'selected' : '' }}>{{ ucfirst($colour) }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('colour'))
                        <span class="invalid-feedback">
                            {{ $errors->first('colour') }}
                        </span>
                    @endif -->


                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')">
                    </x-textarea>
                  
                    <x-file-input
                        type="file"
                        name="toy_image"
                        placeholder="Toy"
                        class="w-full mt-6"
                        field="toy_image"
                        :value="@old('toy_image')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Create Toy</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>