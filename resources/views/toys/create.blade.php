@extends('layouts.app')

@section('content')
    <h3 class="text-center">Create Toy</h3>
    <form action="{{ route('toys.store') }}" method="post">
        @csrf

        <!-- name -->

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

        <!-- colour -->

        <div class="form-group">
            <label for="colour">Toy Colour</label>
            <input type="dr" name="colour" id="colour" class="
            form-control {{ $errors->has('colour') ? 'is-invalid' : '' }}" 
            value="{{ old('colour') }}" placeholder="Enter Colour">
            @if($errors->has('colour'))
                <span class="invalid-feedback">
                    {{ $errors->first('colour') }}
                </span>
            @endif
        </div>

        <!-- description -->

        <div class="form-group">
            <label for="body">Toy Description</label>
            <textarea name="description" id="description" rows="4" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Enter Toy Description">{{ old('description') }}</textarea>
            @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('description') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>

        <!-- create -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection