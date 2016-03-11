@extends('layouts.master')

@section('content')

    <h1>
        IngredientTypes 
        <a href="{{ url('ingredienttypes/create') }}" class="btn btn-primary pull-right">Add New IngredientType</a>
    </h1>
    <hr>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($ingredienttypes as $item)
                <tr>
                    <td><a href="{{ url('ingredienttypes', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{ url('ingredienttypes/' . $item->id . '/edit') }}">
                            Edit
                        </a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['ingredienttypes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $ingredienttypes->render() !!} </div>
    </div>

@endsection
