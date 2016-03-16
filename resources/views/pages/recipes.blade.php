@extends('layouts.master')

@section('content')

    <h1 class="page-title mt0">
        Recipes
        <small class="light">
            all the recipes based on search <span class="normal">({{ $recipes->total() }})</span>
        </small>
    </h1>
    <hr>

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

@endsection
