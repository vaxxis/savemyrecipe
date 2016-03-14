@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h2>Edit User <span class="light">{{ $user->name }}</span></h2>
            <hr>

            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                If you don't want to change your password, leave the password field blank.
            </div>

            {!! BootForm::open(['model' => $user, 'store' => null, 'update' => 'users.update']); !!}
                
                {!! BootForm::text('name', 'Full Name') !!}
                {!! BootForm::text('email', 'Email Address') !!}
                {!! BootForm::password('password', 'Password') !!}
                {!! BootForm::password('password_confirmation', 'Confirm Password') !!}<br>
                {!! BootForm::submit('Save Changes', ['class' => 'btn btn-primary btn-lg']) !!}
            
            {!! BootForm::close() !!}
        </div>
    </div>
</div>
@endsection
