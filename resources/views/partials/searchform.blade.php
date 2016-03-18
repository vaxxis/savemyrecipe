{!! BootForm::open(['url' => url('search'), 'method' => 'get']) !!}
    <div class="input-group">
        {!! Form::text('term', isset($term) ? $term : null, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="icon ion-search"></i></button>
        </span>
    </div>
{!! BootForm::close() !!}
