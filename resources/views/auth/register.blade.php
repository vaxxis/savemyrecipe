@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Signup</h2>
            <hr>

            {!! Form::open(['method' => 'POST', 'url' => 'register', 'class' => 'form-vertical']) !!}
                
                {!! csrf_field() !!}
                {!! BootForm::text('name', 'Full Name') !!}
                {!! BootForm::text('email', 'Email Address') !!}
                {!! BootForm::password('password', 'Password') !!}
                {!! BootForm::password('password_confirmation', 'Confirm Password') !!}<br>
                {!! BootForm::submit('Signup', ['class' => 'btn btn-primary btn-lg']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
