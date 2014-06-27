@extends('layouts.master')

@section('content')
<div id="shows">
    @foreach($shows as $show)
        <div> {{ $show['name'] }} </div>
        <div> {{ $show['description'] }} </div>
        <div>
            <img src="{{ $show['image_src'] }}" class="img-responsive" style="width:50%"/>
        </div>
        {{ HTML::linkRoute('show','View Episodes', ['show_id' => $show['id']]) }}
    @endforeach
</div>d
@stop
