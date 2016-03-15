@foreach ($recipes as $r)

    <div class="recipe row">

        <div class="col-xs-4 col-sm-2">
            @if ($r->photo)
                <img width="110" class="img-rounded m0" src="{{ url($r->photo) }}" alt="{{$r->name}}" />
            @else
                <img width="110" class="img-rounded m0" src="{{ asset('images/placeholder.png') }}" alt="Placeholder" />
            @endif
        </div>

        <div class="col-xs-8 col-sm-7">

            <h3>
                @if ($r->is_private)
                    <i class="icon ion-locked"></i>
                @endif
                <a href="{{ url('r/' . $r->slug) }}">{{ $r->name }}</a>
            </h3>

            <p>
                <span class="text-muted">Level:</span> <span class="difficulty-level">{{ App\Recipe::levels()[$r->level]  }}</span>
                <span class="text-muted">Course: <a class="course-page-link" href="{{ url('all/' . $r->course) }}">{{ App\Recipe::courses()[$r->course] }}</a></span>
            </p>
        </div>

        <div class="col-sm-3">
            <div class="text-muted text-right mt30">
                <small class="opacity7">Published <time>{{ $r->created_at->diffForHumans() }}</time></small>
                <div>by <a class="user-page-link" href="{{ url('/@'. ($r->user->slug ?: $r->user->id)) }}">{{ $r->user->name }}</a></div>
            </div>
        </div>
    </div>
    <hr>
@endforeach

<div class="paginator"> {!! $recipes->render() !!} </div>
