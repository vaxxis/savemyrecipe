
<a class="btn btn-default {{ ( ! isset($course)) ? 'active' : '' }}" href="{{ url('/') }}">All</a>

@foreach (App\Recipe::courses() as $slug => $c)
    <a class="btn btn-default {{ (isset($course) && $slug == $course) ? 'active' : '' }}" href="{{ url('course/' . $slug) }}">{{ $c }}</a>
@endforeach
&nbsp;&nbsp;<small class="text-muted"><i><b>{{ $recipes->total() }}</b> recipes found</i></small>
