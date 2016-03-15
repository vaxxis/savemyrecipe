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

            @if (Auth::user() && Auth::id() == $recipe->user->id)
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ url('recipes/'. $recipe->id .'/edit') }}">
                        <i class="icon ion-edit"></i>
                        Edit
                    </a>
                    <a class="btn btn-danger" href="{{ url('recipes/'. $recipe->id .'/delete') }}">
                        <i class="icon ion-trash-a"></i>
                        Delete
                    </a>
                </div>
            @endif
        </div>

        <div class="lead text-muted light m0 mt20">
            Level: <span class="text-success">{{ App\Recipe::levels()[$recipe->level] }}</span>
            Course: <span class="text-info"><a href="{{ url('all/'.$recipe->course) }}">{{ App\Recipe::courses()[$recipe->course] }}</a></span>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-8">
            <p class="mb40">
                <span class="opacity6">Published</span> {{ $recipe->created_at->diffForHumans() }} <span class="opacity6">by</span> <a href="{{ url('/@'. ($recipe->user->slug ?: $recipe->user->id)) }}">{{ $recipe->user->name }}</a>
            </p>

            {!! $recipe->description !!}
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
