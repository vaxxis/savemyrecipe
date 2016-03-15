
<div class="btn-group">

    <a class="btn btn-default {{ ( ! isset($course)) ? 'active' : '' }}" href="{{ url('/all') }}">
        <i class="icon ion-clipboard"></i> 
        All
    </a>

    @foreach (App\Recipe::courses() as $slug => $c)
        <a class="btn btn-default {{ (isset($course) && $slug == $course) ? 'active' : '' }}" href="{{ url('all/' . $slug) }}">{{ $c }}</a>
    @endforeach
</div>
