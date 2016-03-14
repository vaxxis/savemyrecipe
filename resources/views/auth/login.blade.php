@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Login</h2>
            <hr>

            {!! Form::open(['method' => 'POST', 'url' => 'login', 'class' => 'form-vertical']) !!}

                {!! csrf_field() !!}

                {!! BootForm::text('email', 'Email Address') !!}

                <div class="form-group">
                    <label for="password">Password</label>
                    <small class="pull-right"><a class="text-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a></small>

                    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                {!! BootForm::checkbox('remember', 'Remember Me') !!}

                <br>
                {!! BootForm::submit('Login', ['class' => 'btn btn-lg btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
