@extends('layouts.master')

@section('content')

    <h1>
        CookBook <small>Containing all your recipes <span class="light">({{ $recipes->total() }})</span></small>
        <a href="{{ url('recipes/create') }}" class="btn btn-primary pull-right">Add New Recipe</a>
    </h1>
    <hr>


    @include('partials.recipes-list', ['recipes' => $recipes])

    @if ($recipes->count() == 0)
        <div class="well well-lg text-center">
            <br>
            <br>
            <br>
            <p class="lead margin0">Your CookBook is empty. <a href="{{ url('recipe.create') }}">Create a new Recipe</a></p>
            <br>
            <br>
            <br>
        </div>
    @endif


@endsection
