@extends('admin.layouts.master')

@section('content')

<script>
    $(document).ready(function(){

        $('.chosen-select').chosen({ width: '100%' });
        $('#summernote').summernote({height: '350px'});

    });
</script>

<h1> Edit Blog Post </h1>
    {{ Form::model($blog_post, ['route' => ['admin.blog.update', $blog_post['id']], 'class' => 'form']) }}
    {{ Form::hidden('_method', 'PUT') }}
    <div class = "form-group @if ($errors->has('title')) has-error @endif">
        {{ Form::label('title', 'Title: ', ['class' => 'control-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        {{ $errors->first('title', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('content')) has-error @endif">
        {{ Form::label('content', 'Content: ', ['class' => 'control-label']) }}
        {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
        {{ $errors->first('content', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('meta_keywords')) has-error @endif">
        {{ Form::label('seo[meta_keywords]', 'Meta Keywords: ', ['class' => 'control-label']) }}
        {{ Form::textarea('seo[meta_keywords]', null, ['class' => 'form-control']) }}
        {{ $errors->first('seo[meta_keywords]', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('meta_description')) has-error @endif">
        {{ Form::label('seo[meta_description]', 'Meta Description: ', ['class' => 'control-label']) }}
        {{ Form::textarea('seo[meta_description]', null, ['class' => 'form-control']) }}
        {{ $errors->first('seo[meta_description]', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('categories')) has-error @endif">
        {{ Form::label('categories', 'Category: ', ['class' => 'control-label']) }}
        {{ Form::select('categories[]',
            App::make('Category')->lists('name', 'id'),
            BlogPost::find($blog_post['id'])->categories()->select('categories.id AS id')->lists('id'),
            ['class' => 'form-control chosen-select','multiple']) }}
        {{ $errors->first('categories', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group">
        {{ Form::submit('Edit Post', ['class' => 'form-control']) }}
    </div>
    {{ Form::close() }}

@stop

