@extends('layouts.master')

@section('content.before')

    <div class="jumbotron">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-3">
                    <div class="thumbnail m0">
                        @if ($recipe->photo)
                            <img class="img-responsive img-rounded m0" src="{{ url($recipe->photo) }}" alt="{{$recipe->name}}" data-action="zoom" />
                        @else
                            <img class="img-responsive img-rounded m0" src="{{ asset('images/placeholder.png') }}" alt="Placeholder" />
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-7">
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

                <div class="col-xs-12 col-sm-2 col-md-5">
                    @can('edit', $recipe)
                        <a class="btn btn-info mt10" href="{{ url('recipes/'. $recipe->id .'/edit') }}">
                            <i class="icon ion-compose"></i>
                            Edit
                        </a>
                    @endcan

                    @can('destroy', $recipe)
                        <a class="btn btn-danger mt10 btn-ask-delete-confirm" href="{{ url('recipes/'. $recipe->id .'/delete') }}">
                            <i class="icon ion-trash-a"></i>
                            Delete
                        </a>
                    @endcan
                </div>

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

            <div class="readable">
                {!! $recipe->description !!}
            </div>

        </div>

        <div class="col-sm-4">
            <br class="show-xs">
            <br class="show-xs">
            <h4 class="m0">Ingredients</h4><br>
            <ul class="list-unstyled">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="handwriting">{{ $ingredient }}</li>
                @endforeach
            </ul>
        </div>

    </div>

@endsection
