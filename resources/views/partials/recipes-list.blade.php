@foreach ($recipes as $r)
    <div class="recipe row">
        <div class="col-xs-4 col-sm-2">
            <img class="img-rounded"  src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Image&w=110&h=110&txttrack=0" alt="" />
        </div>
        <div class="col-xs-8 col-sm-7">

            <h3>
                @if ($r->is_private)
                    <i class="icon ion-locked"></i>
                @endif
                <a href="{{ url('r/' . $r->slug) }}">{{ $r->name }}</a>
            </h3>

            <p>
                <span class="text-muted">Level:</span> <span class="text-success">{{ App\Recipe::levels()[$r->level]  }}</span>
                <span class="text-muted">Course: <a href="{{ url('all/' . $r->course) }}">{{ App\Recipe::courses()[$r->course] }}</a></span>
            </p>
        </div>

        <div class="col-sm-3">
            <div class="text-muted mt20">
                <small class="opacity7">Published <time>{{ $r->created_at->diffForHumans() }}</time></small>
                <div>by <a class="user-page-link" href="{{ url('/@'. ($r->user->slug ?: $r->user->id)) }}">{{ $r->user->name }}</a></div>
            </div>
        </div>
    </div>
    <hr>
@endforeach

<div class="paginator"> {!! $recipes->render() !!} </div>
