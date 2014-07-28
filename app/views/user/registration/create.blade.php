@extends('layouts.master')

@section('content')
    <h2>Create an Account</h2>
    <div class="row">
        <div class="col-md-4">
            {{ Form::open(['route' => 'register.store', 'class' => 'form']) }}
            <div class="form-group @if ($errors->has('username')) has-error @endif">
                {{ Form::label('username', 'Username:', ['class' => 'control-label']) }}
                {{ Form::text('username', Input::old('username'), ['class' => 'form-control']) }}
                {{ $errors->first('username', '<span class=control-label>:message</span>') }}
            </div>
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
                {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
                {{ $errors->first('email', '<span class=control-label>:message</span>') }}
            </div>
            <div class="form-group @if ($errors->has('password')) has-error @endif">
                {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
                {{ Form::password('password',['class' => 'form-control']) }}
                {{ $errors->first('password', '<span class=control-label>:message</span>') }}
            </div>
            <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                {{ Form::label('password', 'Confirm Password:', ['class' => 'control-label']) }}
                {{ Form::password('password_confirmation',['class' => 'form-control']) }}
                {{ $errors->first('password_confirmation', '<span class=control-label>:message</span>') }}
            </div>
            <div class="form-group">
                {{ Form::submit('Sign Up!', ['class' => 'form-control']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop