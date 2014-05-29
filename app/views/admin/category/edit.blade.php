@extends('admin.layouts.master')

@section('content')
<h1> Edit Category </h1>

    {{ Form::model($category, ['route' => ['admin.category.update', $category['id']], 'class' => 'form']) }}
    {{ Form::hidden('_method', 'PUT') }}
    <div class = "form-group @if ($errors->has('title')) has-error @endif">
        {{ Form::label('name', 'Name: ', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        {{ $errors->first('name', '<span class=control-label>:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::submit('Edit Category', ['class' => 'form-control']) }}
    </div>
    {{ Form::close() }}

@stop