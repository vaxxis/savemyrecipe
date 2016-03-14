@extends('layouts.master')

@section('content.before')
<div class="jumbotron">
    <div class="container">
        <div class="clearfix">
            <h2 class="pull-left m0">
                @if ($recipe->is_private)
                    <i class="icon ion-locked"></i>
                @endif
                {{ $recipe->name }}
            </h2>
            @if (Auth::user())
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ url('recipes/'. $recipe->id .'/edit') }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('recipes/'. $recipe->id .'/delete') }}">Delete</a>
                </div>
            @endif
        </div>

        <div class="lead text-muted">
            Level: <span class="text-success">{{ App\Recipe::levels()[$recipe->level] }}</span>
            Course: <span class="text-info">{{ App\Recipe::courses()[$recipe->course] }}</span>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="lead">
                {!! $recipe->description !!}
            </div>
        </div>
        <div class="col-sm-4">
            <h3 class="m0">Ingredients</h3><br>
            <ul class="list-group">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="list-group-item">{{ $ingredient }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
