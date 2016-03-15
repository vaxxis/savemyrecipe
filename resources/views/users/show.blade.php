@extends('layouts.master')

@section('content.before')
<div class="jumbotron">
    <div class="container">
        <div class="clearfix">
            <div class="pull-left m0">
                <img class="img-rounded" src="http://www.gravatar.com/avatar/{{ md5($user->email) }}?s=80" alt="User Gravatar" />
            </div>
            <h2 class="pull-left m0 ml30 mt20">
                {{ $user->name }}
            </h2>

            <p class="lead pull-right mt20">
                Signed up {{ $user->created_at->diffForHumans() }}
            </p>
        </div>
    </div>
</div>
@endsection

@section('content')

    <h2>User Recipes <small class="light">published <span class="normal">({{ $recipes->total() }})</span> recipes</small></h2>
    <hr>

    @include('partials.recipes-list', [ // recipes page list
        'recipes' => $recipes,
        'course' => isset($course) ? $course : null,
    ])

@endsection
