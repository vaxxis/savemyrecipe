@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <h1 class="page-title mt0">
                CookBook <small class="light">All your personal recipes <span class="normal">({{ $recipes->total() }})</span></small>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-4 text-right">
            <a href="{{ url('recipes/create') }}" class="btn btn-primary">Add New Recipe</a>
        </div>
    </div>
    <hr>


    @include('partials.recipes-list', ['recipes' => $recipes])

    @if ($recipes->count() == 0)
        <div class="well well-lg text-center">
            <br>
            <br>
            <br>
            <p class="lead m0">Your CookBook is empty. <a href="{{ url('recipes/create') }}">Add a new Recipe</a></p>
            <br>
            <br>
            <br>
        </div>
    @endif


@endsection
