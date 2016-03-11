@extends('layouts.master')

@section('content')

    <h1>Edit Recipe</h1>
    <hr>

    {{-- create/update form --}}
    @include('recipes.form')

@endsection