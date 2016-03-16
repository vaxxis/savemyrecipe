@foreach ($recipes as $recipe)

    <div class="recipe row">

        <div class="col-xs-4 col-sm-2">
            @if ($recipe->photo)
                <img width="110" class="img-rounded m0" src="{{ url($recipe->photo) }}" alt="{{$recipe->name}}" />
            @else
                <img width="110" class="img-rounded m0" src="{{ asset('images/placeholder.png') }}" alt="Placeholder" />
            @endif
        </div>

        <div class="col-xs-8 col-sm-7">

            <h3>
                @if ($recipe->is_private)
                    <i class="icon ion-locked" data-toggle="tooltip" data-placement="top" title="Only you see this recipe"></i>
                @endif
                <a href="{{ url('r/' . $recipe->slug) }}">{{ $recipe->name }}</a>
            </h3>

            <p>
                <span class="text-muted">Level:</span> <span class="difficulty-level">{{ App\Recipe::levels()[$recipe->level]  }}</span>
                <span class="text-muted">Course: <a class="course-page-link" href="{{ url('all/' . $recipe->course) }}">{{ App\Recipe::courses()[$recipe->course] }}</a></span>
            </p>
        </div>

        <div class="col-xs-12 col-sm-3">
            <div class="text-muted text-right mt30">
                <small class="opacity7">Published <time>{{ $recipe->created_at->diffForHumans() }}</time></small>
                <div>by <a class="user-page-link" href="{{ url('/@'. ($recipe->user->slug ?: $recipe->user->id)) }}">{{ $recipe->user->name }}</a></div>
            </div>
        </div>
    </div>
    <hr>
@endforeach

<div class="paginator"> {!! $recipes->render() !!} </div>
