@extends('layouts.master')

@section('content.before')
  <div class="jumbotron">
      <div class="container">
          <h2>SaveMy<b>Recipe</b></h2>
          <p class="lead">Your own personal cookbook!</p>

          <br>

          @if (Auth::user())
            <a class="btn btn-lg btn-primary" href="{{ url('recipes/create') }}">Create a Recipe</a>
          @else
            <a class="btn btn-lg btn-primary" href="{{ url('register') }}">Sign Up Now</a>
            &nbsp;&nbsp;Already have an account? <a href="{{ url('login') }}">Login</a>
          @endif
      </div>
  </div>
@endsection

@section('content')

    <h1 class="">Recipes <small>Recipes around the world</small></h1><hr>

    <a class="btn btn-default {{ ( ! isset($course)) ? 'active' : '' }}" href="{{ url('/') }}">All</a>
    @foreach (App\Recipe::courses() as $slug => $c)
        <a class="btn btn-default {{ (isset($course) && $slug == $course) ? 'active' : '' }}" href="{{ url('course/' . $slug) }}">{{ $c }}</a>
    @endforeach
    &nbsp;&nbsp;<small class="text-muted"><i><b>{{ $recipes->total() }}</b> recipes found</i></small>

    <hr>

    <div class="row">
        <div class="col-sm-8">

            @foreach ($recipes as $r)
                <div class="recipe row">
                    <div class="col-sm-3">
                        <img class="img-rounded"  src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Image&w=110&h=110&txttrack=0" alt="" />
                    </div>
                    <div class="col-sm-9">
                        <a href="{{ url('r/' . $r->slug) }}"><h3>{{ $r->name }}</h3></a>

                        <p>
                            <span class="text-muted">Level:</span> <span class="text-success">{{ App\Recipe::levels()[$r->level]  }}</span>
                            <span class="text-muted">Course: <a href="{{ url('course/' . $r->course) }}">{{ App\Recipe::courses()[$r->course] }}</a></span>
                        </p>

                        <div class="text-muted">
                            <small>Published <time>{{ $r->created_at->diffForHumans() }}</time> by {{ $r->user->name }}</small>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

        <div class="col-sm-4">

        </div>
    </div>

    <div class="paginator"> {!! $recipes->render() !!} </div>

    <br>
    <br>

@endsection
