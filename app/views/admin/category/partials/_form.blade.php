
{{ Form::open(['route' => 'admin.category.store', 'class' => 'form']) }}
    <div class = "form-group @if ($errors->has('title')) has-error @endif">
        {{ Form::label('name', 'Category: ', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        {{ $errors->first('name', '<span class=control-label>:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::submit('Create Category', ['class' => 'form-control']) }}
    </div>
{{ Form::close() }}