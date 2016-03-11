@extends('layouts.master')

@section('content')

    <h1>Ingredient</h1>
    <hr>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ingredient->id }}</td> <td> {{ $ingredient->name }} </td><td> {{ $ingredient->description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection