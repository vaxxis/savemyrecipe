@extends('layouts.master')

@section('content')

    <h1>IngredientType</h1>
    <hr>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ingredienttype->id }}</td> <td> {{ $ingredienttype->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h2>Ingredients</h2>
    <hr>

    <ul>
        @foreach ($ingredienttype->ingredients as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>

    <h3>Create new ingredient</h3>
    <hr>

    {!! Form::open(['url' => 'ingredients', 'class' => 'form-horizontal']) !!}

        <input name="ingredient_type_id" type="hidden" value="{{ $ingredienttype->id }}">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

@endsection