
@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>All Toys</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Colour</th>
                <th>Type</th>
                <th>Size</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($toys as $toy)
            <tr>
                <td> <a href="{{ route('toys.show', $toy) }}"> {{ $toy->name }} </a></td>
                <td>{{$toy->colour}} </td>
                <td>{{$toy->type}} </td>
                <td>{{$toy->size}} </td>
                <td>@if ($toy->toy_image)
                        <img src="{{ $toy->toy_image }}"
                        alt="{{ $toy->title }}" width="100"
                     @else 
                        No Image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>D
</div>
@endsection
