<div class="searchbox">
    {!! BootForm::open(['url' => url('search'), 'method' => 'get']) !!}
        <div class="input-searchbox">
            {!! Form::text('s', isset($term) ? $term : null, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
            <span class="input-searchbox-btn">
                <button class="btn btn-default" type="submit"><i class="icon ion-ios-search-strong"></i></button>
            </span>
        </div>
    {!! BootForm::close() !!}
</div>
