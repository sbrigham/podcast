@extends('layouts.master')

@section('content')
<h1> Login </h1>
<div class="row">
    <div class="col-md-4">
        {{ Form::open(['route' => 'sessions.store', 'class' => 'form']) }}
        <div class="form-group @if ($errors->has('username')) has-error @endif">
            {{ Form::label('username', 'Username:', ['class' => 'control-label']) }}
            {{ Form::text('username', Input::old('username'), ['class' => 'form-control']) }}
            {{ $errors->first('username', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group @if ($errors->has('password')) has-error @endif">
            {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ $errors->first('password', '<span class=control-label>:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::submit('Login', ['class' => 'form-control']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop