@foreach ($recipes as $r)
    <div class="recipe row">
        <div class="col-sm-2">
            <img class="img-rounded"  src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Image&w=110&h=110&txttrack=0" alt="" />
        </div>
        <div class="col-sm-8">

            <h3>
                @if ($r->is_private)
                    <i class="icon ion-locked"></i>
                @endif
                <a href="{{ url('r/' . $r->slug) }}">{{ $r->name }}</a>
            </h3>

            <p>
                <span class="text-muted">Level:</span> <span class="text-success">{{ App\Recipe::levels()[$r->level]  }}</span>
                <span class="text-muted">Course: <a href="{{ url('course/' . $r->course) }}">{{ App\Recipe::courses()[$r->course] }}</a></span>
            </p>

            <div class="text-muted">
                <small>Published <time>{{ $r->created_at->diffForHumans() }}</time> by {{ $r->user->name }}</small>
            </div>
        </div>

        <div class="col-sm-2">
            @if (Auth::user())
                <br>
                <a class="btn btn-default btn-sm btn-block" href="{{ url('recipes/'. $r->id .'/edit') }}">Edit</a>
                <a class="btn btn-default btn-sm btn-block" href="{{ url('recipes/'. $r->id .'/delete') }}">Delete</a>
            @endif
        </div>
    </div>
    <hr>
@endforeach

<div class="paginator"> {!! $recipes->render() !!} </div>
