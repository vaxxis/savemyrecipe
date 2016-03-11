@extends('layouts.master')

@section('content')

    <h1>Edit Ingredient</h1>
    <hr>

    {!! BootForm::open(['model' => $ingredient, 'store' => 'ingredients.store', 'update' => 'ingredients.update']); !!}
        {!! BootForm::text('name', 'Name') !!}
        {!! BootForm::select('ingredient_type_id', 'Ingredient Type', $ingredientTypesSelect) !!}
        {!! BootForm::submit('save') !!}
    {!! BootForm::close() !!}

@endsection