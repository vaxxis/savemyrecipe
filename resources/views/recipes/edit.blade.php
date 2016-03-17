@extends('layouts.master')

@section('content')

    <h1 class="page-title mt0">Edit Recipe</h1>
    <hr>

    {{-- create/update form --}}
    @include('recipes.form')

@endsection