<script>
    $(document).ready(function(){
        $('.chosen-select').chosen({ width: '100%' });
        $('#summernote').summernote();
    });
</script>
{{ Form::open(['route' => 'admin.blog.store', 'class' => 'form']) }}
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
        {{ Form::label('meta_keywords', 'Meta Keywords: ', ['class' => 'control-label']) }}
        {{ Form::textarea('meta_keywords', null, ['class' => 'form-control']) }}
        {{ $errors->first('meta_keywords', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('meta_description')) has-error @endif">
        {{ Form::label('meta_description', 'Meta Description: ', ['class' => 'control-label']) }}
        {{ Form::textarea('meta_description', null, ['class' => 'form-control']) }}
        {{ $errors->first('meta_description', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group @if ($errors->has('categories')) has-error @endif">
        {{ Form::label('categories', 'Category: ', ['class' => 'control-label']) }}
        {{ Form::select('categories[]', App::make('Category')->lists('name', 'id'), null, ['class' => 'form-control chosen-select','multiple']) }}
        {{ $errors->first('categories', '<span class=control-label>:message</span>') }}
    </div>
    <div class = "form-group">
        {{ Form::submit('Create Blog Post', ['class' => 'form-control']) }}
    </div>
{{ Form::close() }}