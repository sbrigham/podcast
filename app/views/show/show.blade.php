@extends('layouts.master')

@section('content')

<div id="show_data">
<h1> {{ $show['name'] }} </h1>
    <div>
        <img src="{{ $show['image_src']}}" class="img-responsive" />
    </div>
    <div> {{ $show['description'] }}  </div>
</div>

@stop