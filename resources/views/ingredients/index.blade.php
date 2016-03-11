@extends('layouts.master')

@section('content')

    <h1>
        Ingredients 
        <a href="{{ url('ingredients/create') }}" class="btn btn-primary pull-right">Add New Ingredient</a>
    </h1>
    <hr>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($ingredients as $item)
                    <tr>
                        <td><a href="{{ url('ingredients', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->ingredientType->name }}</td>
                        <td class="actions-column">
                            <a class="btn btn-info btn-xs" href="{{ url('ingredients/' . $item->id . '/edit') }}">
                                Edit
                            </a> 
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['ingredients', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $ingredients->render() !!} </div>
    </div>

@endsection
