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

    <h1 class="page-title">
        <span class="icon ion-pizza text-muted"></span>
        Recipes <small>Recipes around the world</small>
    </h1><hr>

    @include('partials.courses-buttons', [ // recipes course buttons
        'course' => isset($course) ? $course : null
    ])

    <hr>

    <div class="row">
        <div class="col-sm-12">


            @include('partials.recipes-list', [ // recipes page list
                'recipes' => $recipes,
                'course' => isset($course) ? $course : null,
            ])


        </div>
    </div>

    <br>
    <br>

@endsection
