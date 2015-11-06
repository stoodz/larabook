@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Sign In!</h1>

        <!-- Email form text input -->
        {{ Form::open(['route' => 'login_path']) }}
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!-- Password form text input -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password',['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!--  form text input -->
            <div class="form-group">
                {{ Form::submit('Sign In',['class' => 'btn btn-primary']) }}
                {{ link_to('/password/remind', 'Reset your password') }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop