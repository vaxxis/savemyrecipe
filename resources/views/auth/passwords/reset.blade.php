@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Reset Password</h2>
            <hr>

            {!! Form::open(['url' => '/password/reset', 'class' => 'form-vertical']) !!}
                
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">
                {!! BootForm::text('email', 'Email Address', $email) !!}
                {!! BootForm::password('password', 'New Password') !!}
                {!! BootForm::password('password_confirmation', 'Confirm New Password') !!}<br>
                {!! BootForm::submit('Reset Password', ['class' => 'btn btn-lg btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
