@extends('layouts.master')

@section('content.before')
  <div class="jumbotron home-header">
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

    <div class="section">
        <div class="row">

            <h2 class="light text-center mb50">Courses</h2>

            @foreach (App\Recipe::courses() as $key => $value)
                <div class="col-sm-4 text-center mt10">
                    <a class="course" href="{{ url('all/'.$key) }}">
                        <img width="200" class="img-circle" src="{{ asset('images/courses/'.$key.'.jpg') }}" alt="{{ $value }}" />
                        <h3>{{ $value }}</h3>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

@endsection
