@extends('layouts.master')

@section('content')

    <br>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

                <h1 class="">All Recipes</h1>
                <hr>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              
                @foreach ($recipes as $r)
              
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{ $r->id }}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $r->id }}" aria-expanded="true" aria-controls="collapse{{ $r->id }}">
                                    {{ $r->name }}
                                </a>
                                <span class="text-muted pull-right"><small>{{ $r->user->name }}</small></span>
                            </h4>
                        </div>
                        <div id="collapse{{ $r->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $r->id }}">
                              <div class="panel-body">
                                {!! $r->description !!}
                                
                                <h4>Ingredients</h4>
                                @foreach ($r->ingredients as $i)
                                    <div>{{ $i->name }}</div>
                                @endforeach

                              </div>
                        </div>
                    </div>

                @endforeach

            </div>            

        </div>
    </div>

    <br>
    <br>

@endsection
