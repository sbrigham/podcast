@extends('layouts.master')

@section('content')

<h1> Show Profile </h1>


<div id="show_data">
    <div> {{ $show['name'] }} </div>

    <div>
        <img src="{{ $show['image_src']}}" class="img-responsive" />
    </div>
    <div> {{ $show['description'] }}  </div>
</div>

@stop