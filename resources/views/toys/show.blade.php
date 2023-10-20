

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>View Toy</h1>

        <table class="table table-hover">
            <tbody>
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ $toy->name }}</td>
                </tr>

                <tr>
                    <td><strong>Colour</strong></td>
                    <td>{{ $toy->colour }}</td>
                </tr>
                <tr>
                    <td><strong>description</strong></td>
                    <td>{{ $toy->description }}</td>
                </tr>
            </tbody>
    </table>
</div>
 @endsection