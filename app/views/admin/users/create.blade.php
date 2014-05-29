@extends('admin.layouts.master')

@section('content')
<h1>Create a new user</h1>
<div class="row">
    <div class="col-md-4">
        {{ Form::open(['route' => 'admin.user.store', 'class' => 'form']) }}
        <div class="form-group @if ($errors->has('email')) has-error @endif">
            {{ Form::label('email', 'Email: ', ['class' => 'control-label']) }}
            {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
            {{ $errors->first('email', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
            {{ Form::label('first_name', 'First Name: ', ['class' => 'control-label']) }}
            {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
            {{ $errors->first('first_name', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
            {{ Form::label('last_name', 'Last Name: ', ['class' => 'control-label']) }}
            {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
            {{ $errors->first('last_name', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
            {{ Form::label('password', 'Password: ', ['class' => 'control-label']) }}
            {{ Form::password('password',['class' => 'form-control']) }}
            {{ $errors->first('password', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
            {{ Form::label('password', 'Confirm Password: ', ['class' => 'control-label']) }}
            {{ Form::password('password_confirmation',['class' => 'form-control']) }}
            {{ $errors->first('password_confirmation', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'form-control']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop