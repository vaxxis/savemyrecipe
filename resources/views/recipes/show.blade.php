@extends('layouts.master')

@section('content')

    <h1>Recipe</h1>
    <hr>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $recipe->id }}</td> <td> {{ $recipe->name }} </td><td> {{ $recipe->description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection