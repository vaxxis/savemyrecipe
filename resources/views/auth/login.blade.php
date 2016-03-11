@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Login</h3></div>
                <div class="panel-body">
                    <form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        {!! BootForm::text('email', 'Email Address') !!}
                        {!! BootForm::password('password') !!}
                        {!! BootForm::checkbox('remember', 'Remember Me') !!}
                        {!! BootForm::submit('Login', ['class' => 'btn btn-lg btn-primary']) !!}

                        <div>
                            <a class="text-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
