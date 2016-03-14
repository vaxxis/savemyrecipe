@extends('layouts.master')

<!-- Main Content -->
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Reset Password</h2>
            <hr>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['url' => '/password/email', 'class' => 'form-vertical']) !!}
                
                {!! BootForm::text('email', 'Email Address') !!}
                {!! BootForm::submit('Send Password Reset Link', ['class' => 'btn btn-lg btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
