@extends('layouts.app')

@section('content')
    <h3 class="text-center">Create Toy</h3>
    <form action="{{ route('toys.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Toy Name</label>
            <input type="text" name="name" id="name" class="
            form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
            value="{{ old('name') }}" placeholder="Enter Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <!-- colours -->


        <div class="form-group">
        <label for="colour">Toy Colour</label>
        <select name="colour" id="colour" class="form-control {{ $errors->has('colour') ? 'is-invalid' : '' }}">
            <option value="" selected >Select Colour</option>
            @foreach(['red', 'green', 'mixed', 'black', 'white', 'orange', 'purple', 'blue', 'yellow', 'pink', 'brown'] as $colour)
                <option value="{{ $colour }}" {{ old('colour') === $colour ? 'selected' : '' }}>{{ ucfirst($colour) }}</option>
            @endforeach
        </select>
        @if($errors->has('colour'))
            <span class="invalid-feedback">
                {{ $errors->first('colour') }}
            </span>
        @endif
    </div>

</form>

        <!-- size -->


        <div class="form-group">
            <label for="size">Size</label>
            <select name="size" id="size" class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}">
                <option value="" selected >Select Size</option>
                @foreach(['small', 'medium', 'large'] as $size)
                <option value="{{ $size }}" {{ old('size') === $size ? 'selected' : '' }}>{{ ucfirst($size) }}</option>
            @endforeach
            </select>
            @if($errors->has('size'))
                <span class="invalid-feedback">
                    {{ $errors->first('size') }}
                </span>
            @endif
        </div>

        <!-- type -->


        <div class="form-group">
            <label for="type">Toy Type</label>
            <select name="type" id="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">

            <option value="" selected >Select Type</option>
                @foreach(['training', 'rope', 'bone','stick','stuffed'] as $type)
                <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach

            </select>
            @if($errors->has('type'))
                <span class="invalid-feedback">
                    {{ $errors->first('type') }}
                </span>
            @endif
        </div>

        <!-- description -->

        <div class="form-group">
            <label for="body">Toy Description</label>
            <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Enter Toy Description">{{ old('body') }}</textarea>
            @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('body') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>



        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    
@endsection