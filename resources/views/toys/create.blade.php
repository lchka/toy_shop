@extends('layouts.app')

@section('content')
    <h3 class="text-center">Create Book</h3>
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
        <div class="form-group">
            <label for="colour">Toy Colour</label>
            <input type="text" name="colour" id="colour" class="
            form-control {{ $errors->has('colour') ? 'is-invalid' : '' }}" 
            value="{{ old('colour') }}" placeholder="Enter Colour">
            @if($errors->has('colour'))
                <span class="invalid-feedback">
                    {{ $errors->first('colour') }}
                </span>
            @endif
        </div>
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