@extends('layouts.master')

@section('content')

    <h1>Create New Ingredient</h1>
    <hr>

    {!! BootForm::open(['model' => new App\Ingredient, 'store' => 'ingredients.store', 'update' => 'ingredients.update']); !!}
        {!! BootForm::text('name', 'Name') !!}
        {!! BootForm::select('ingredient_type_id', 'Ingredient Type', $ingredientTypesSelect) !!}
        {!! BootForm::submit('save') !!}
    {!! BootForm::close() !!}

@endsection