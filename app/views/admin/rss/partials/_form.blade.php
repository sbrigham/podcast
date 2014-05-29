
{{ Form::open(['route' => 'admin.rss.store', 'class' => 'form']) }}
    <div class = "form-group @if ($errors->has('title')) has-error @endif">
        {{ Form::label('url', 'Feed Url: ', ['class' => 'control-label']) }}
        {{ Form::text('url', null, ['class' => 'form-control']) }}
        {{ $errors->first('url', '<span class=control-label>:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::submit('Add Rss Feed', ['class' => 'form-control']) }}
    </div>
{{ Form::close() }}