@extends('layouts.master')

@section('content.before')
<div class="jumbotron">
    <div class="container">
        <div class="clearfix">

            @if ($recipe->photo)
                <div class="thumbnail pull-left mr20">
                    <img width="160" class="img-rounded" src="{{ url($recipe->photo) }}" alt="{{$recipe->name}}" />
                </div>
            @endif

            <div class="pull-left">
                <h2 class="m0 mt20">
                    @if ($recipe->is_private)
                        <i class="icon ion-locked"></i>
                    @endif
                    {{ $recipe->name }}
                </h2>
                <div class="lead text-muted light mt10">
                    Level: <span class="difficulty-level normal">{{ App\Recipe::levels()[$recipe->level] }}</span>
                    Course: <span class=""><a class="course-page-link normal" href="{{ url('all/'.$recipe->course) }}">{{ App\Recipe::courses()[$recipe->course] }}</a></span>
                </div>
            </div>

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
    </div>
</div>
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-8">
            <p class="mb40">
                <span class="opacity6">Published</span> {{ $recipe->created_at->diffForHumans() }} <span class="opacity6">by</span> <a class="user-page-link" href="{{ url('/@'. ($recipe->user->slug ?: $recipe->user->id)) }}">{{ $recipe->user->name }}</a>
            </p>

            {!! $recipe->description !!}
        </div>

        <div class="col-sm-4">
            <h4 class="m0">Ingredients</h4><br>
            <ul class="list-group">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="list-group-item">{{ $ingredient }}</li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
