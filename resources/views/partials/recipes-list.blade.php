@if ($recipes->count() == 0)
    <div class="well well-lg">
        <p class="lead text-center m0 m50">
            No results found.
        </p>
    </div>
@endif

@foreach ($recipes as $recipe)

    <div class="recipe row">

        <div class="col-xs-4 col-sm-2">
            @if ($recipe->photo)
                <img width="110" class="img-responsive img-rounded m0" src="{{ url($recipe->photo) }}" alt="{{$recipe->name}}" />
            @else
                <img width="110" class="img-responsive img-rounded m0" src="{{ asset('images/placeholder.png') }}" alt="Placeholder" />
            @endif
        </div>

        <div class="col-xs-8 col-sm-6">

            <h3>
                @if ($recipe->is_private)
                    <i class="icon ion-locked" data-toggle="tooltip" data-placement="top" title="Only you can see this recipe"></i>
                @endif
                <a href="{{ url('recipe/' . $recipe->slug) }}">{{ $recipe->name }}</a>
            </h3>

            <p>
                <span class="text-muted">Level:</span> <span class="difficulty-level">{{ App\Recipe::levels()[$recipe->level]  }}</span>
                <span class="text-muted">Course: <a class="course-page-link" href="{{ url('all/' . $recipe->course) }}">{{ App\Recipe::courses()[$recipe->course] }}</a></span>
            </p>
        </div>

        <div class="hidden-xs col-sm-4">

            <div class="mt30 text-right">
                @can('edit', $recipe)
                    <!-- Edit Recipe Button -->
                    <a class="btn btn-sm btn-info" href="{{ url('recipes/'. $recipe->id .'/edit') }}">
                        <i class="icon ion-compose"></i>
                        Edit
                    </a>
                @endcan

                @can('destroy', $recipe)
                    <!-- Delete Recipe Button -->
                    <a class="btn btn-sm btn-danger btn-ask-delete-confirm" href="{{ url('recipes/'. $recipe->id .'/delete') }}">
                        <i class="icon ion-trash-a"></i>
                        Delete
                    </a>
                @endcan

                @if ($recipe->user->id != Auth::id())
                    <!-- Show recipe meta -->
                    <div class="text-muted">
                        <small class="opacity7">Published <time>{{ $recipe->created_at->diffForHumans() }}</time></small>
                        <div>by <a class="user-page-link" href="{{ url('/@'. ($recipe->user->slug ?: $recipe->user->id)) }}">{{ $recipe->user->name }}</a></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
@endforeach

<div class="paginator"> {!! $recipes->render() !!} </div>
