@extends('layouts.master')

@section('content')

    <h1>
        Recipes 
        <a href="{{ url('recipes/create') }}" class="btn btn-primary pull-right">Add New Recipe</a>
    </h1>
    <hr>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th width="20%">Name</th>
                    <th width="25%">Description</th>
                    <th width="25%">Ingredients</th>
                    <th width="15%">Owner</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($recipes as $item)
                <tr>
                    <td><a href="{{ url('recipes', $item->id) }}"><big>{{ $item->name }}</big></a></td>
                    <td>{{ $item->description }}</td>
                    
                    <td>
                        @foreach ($item->ingredients as $ingredient)
                            {{ $ingredient->name }},
                        @endforeach
                    </td>

                    <td> {{ $item->user->name }} </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ url('recipes/' . $item->id . '/edit') }}">
                            Edit
                        </a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['recipes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $recipes->render() !!} </div>
    </div>

@endsection
