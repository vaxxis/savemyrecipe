@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-sm-8">
    		<h1 class="page-title mt0">Edit Recipe</h1>
    	</div>
    	<div class="col-sm-4 text-right">
    		<a class="btn btn-default" href="{{ url('recipe/' . $recipe->slug) }}">View Recipe <i class="icon ion-clipboard"></i></a>
    	</div>
    </div>
    <hr>

    {{-- create/update form --}}
    @include('recipes.form')

@endsection