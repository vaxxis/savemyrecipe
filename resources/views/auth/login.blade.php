@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
                <h2>Login</h2>
                <hr>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

                    {!! BootForm::text('email', 'Email Address') !!}
                    {!! BootForm::password('password') !!}
                    {!! BootForm::checkbox('remember') !!}
                    {!! BootForm::submit('Login') !!}

                    <div>
                        <a class="text-right" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </form>


        </div>
    </div>
</div>

@endsection
