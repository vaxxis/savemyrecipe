@extends('layouts.master')

@section('content')

    <h1 class="page-title m0">
        <span class="icon ion-ios-nutrition text-muted"></span>
        Ingredients

        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalCreateIngredient">
            Add Ingredient
        </button>
    </h1>
    <hr>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <div class="bold mb10"><i class="icon ion-alert-circled"></i> Ooops, there are some errors!</div>
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <br>

    <div class="row">

        <div class="col-sm-8">

            <ul class="list-group">
                @foreach ($ingredients as $ingredient)
                    <li class="list-group-item">
                        <div class="ingredient">

                            {{ $ingredient->name }}
                            <small class="text-muted">({{ $ingredient->ingredienttype }})</small>

                            <a class="btn btn-default btn-sm btn-ask-delete-confirm pull-right" href="{{ url('ingredients/'.$ingredient->id.'/delete') }}">
                                <span class="icon ion-trash-a text-danger"></span> delete
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="paginator">{{ $ingredients->render() }}</div>

        </div>

        <div class="col-sm-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ingredient Types</h3>
                </div>
                <div class="panel-body">
                    @foreach (App\IngredientType::orderBy('name')->get() as $type)
                        <div>
                            {{ $type }}
                            <a class="btn btn-default btn-sm btn-ask-delete-confirm pull-right" href="{{ url('ingredienttypes/'.$type->id.'/delete') }}">
                                <span class="icon ion-trash-a text-danger"></span> delete
                            </a>
                        </div>
                        <hr>
                    @endforeach

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreateIngredientType">
                        Add Ingredient Type
                    </button>
                </div>
            </div>

        </div>

    </div>



    {{-- Create ingredient modal --}}
    <div class="modal fade" id="modalCreateIngredient" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Create New  Ingredient</h3>
                </div>
                <div class="modal-body">
                    @include('ingredients.form')
                </div>
            </div>
        </div>
    </div>


    {{-- Create ingredientType modal --}}
    <div class="modal fade" id="modalCreateIngredientType" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Create New  Ingredient Type</h3>
                </div>
                <div class="modal-body">

                    {!! BootForm::open(['model' => new App\IngredientType, 'store' => 'ingredienttypes.store']); !!}
                        {!! BootForm::text('name', 'Name', null, ['required']) !!}
                        {!! BootForm::submit('Save Ingredient Type', ['class' => 'btn btn-primary btn-lg']) !!}
                    {!! BootForm::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection
