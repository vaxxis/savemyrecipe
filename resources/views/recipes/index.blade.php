@extends('layouts.master')

@section('content')

    <h1>
        CookBook <small>Containing all your recipes</small>
        <a href="{{ url('recipes/create') }}" class="btn btn-primary pull-right">Add New Recipe</a>
    </h1>
    <hr>


    @include('partials.recipes-list', ['recipes' => $recipes])


@endsection
